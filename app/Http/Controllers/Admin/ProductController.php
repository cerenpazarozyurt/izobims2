<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category', 'images')->orderBy('id', 'desc')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::where('is_active', true)->orderBy('id', 'desc')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048',
            'is_active' => 'nullable|boolean',
            'specifications' => 'nullable|array',
            'specifications.*.property_name' => 'required|string|max:255',
            'specifications.*.unit' => 'nullable|string|max:255',
            'specifications.*.value' => 'required|string|max:255',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $product = Product::create([
            'category_id' => $validated['category_id'],
            'name' => $validated['name'],
            'is_active' => $validated['is_active'],
            'order' => 0,
        ]);

        // Resimleri kaydet
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $image->store('products', 'public'),
                    'order' => $index,
                ]);
            }
        }

        // Özellikleri kaydet
        if ($request->has('specifications')) {
            foreach ($request->specifications as $index => $spec) {
                ProductSpecification::create([
                    'product_id' => $product->id,
                    'property_name' => $spec['property_name'],
                    'unit' => $spec['unit'] ?? null,
                    'value' => $spec['value'],
                    'order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Ürün başarıyla oluşturuldu.');
    }

    public function edit(Product $product)
    {
        $categories = Category::where('is_active', true)->orderBy('id', 'desc')->get();
        $product->load('specifications', 'images');
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        try {
            $validated = $request->validate([
                'category_id' => 'required|exists:categories,id',
                'name' => 'required|string|max:255',
                'images' => 'nullable|array',
                'images.*' => 'image|max:2048',
                'is_active' => 'nullable|boolean',
                'specifications' => 'nullable|array',
                'specifications.*.property_name' => 'nullable|string|max:255',
                'specifications.*.unit' => 'nullable|string|max:255',
                'specifications.*.value' => 'nullable|string|max:255',
            ]);

            // Ürün bilgilerini güncelle
            $product->update([
                'category_id' => $validated['category_id'],
                'name' => $validated['name'],
                'is_active' => $request->has('is_active'),
            ]);

        // Yeni resimleri ekle
        if ($request->hasFile('images')) {
            $existingImagesCount = $product->images()->count();
            foreach ($request->file('images') as $index => $image) {
                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $image->store('products', 'public'),
                    'order' => $existingImagesCount + $index,
                ]);
            }
        }

        // Özellikleri güncelle (sadece gönderilmişse ve boş değilse)
        if ($request->has('specifications')) {
            $validSpecs = array_filter($request->specifications, function($spec) {
                return !empty($spec['property_name']) && !empty($spec['value']);
            });
            
            if (count($validSpecs) > 0) {
                // Mevcut özellikleri sil
                $product->specifications()->delete();
                
                // Yeni özellikleri ekle
                foreach ($validSpecs as $index => $spec) {
                    ProductSpecification::create([
                        'product_id' => $product->id,
                        'property_name' => $spec['property_name'],
                        'unit' => $spec['unit'] ?? null,
                        'value' => $spec['value'],
                        'order' => $index,
                    ]);
                }
            }
        }

            return redirect()->route('admin.products.index')->with('success', 'Ürün başarıyla güncellendi.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Bir hata oluştu: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(Product $product)
    {
        // Ürün resimlerini sil
        foreach ($product->images as $image) {
            Storage::disk('public')->delete($image->image);
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Ürün başarıyla silindi.');
    }
}

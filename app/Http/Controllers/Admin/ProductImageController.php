<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    public function destroy(ProductImage $productImage)
    {
        Storage::disk('public')->delete($productImage->image);
        $productImage->delete();
        return redirect()->back()->with('success', 'Fotoğraf başarıyla silindi.');
    }
}

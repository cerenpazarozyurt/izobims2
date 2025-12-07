<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminRegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $sliders = \App\Models\Slider::where('is_active', true)->orderBy('order')->get();
    $categories = \App\Models\Category::where('is_active', true)
        ->with(['products' => function($query) {
            $query->where('is_active', true)
                  ->with('images')
                  ->orderBy('id', 'desc')
                  ->limit(3);
        }])
        ->orderBy('id', 'desc')
        ->get();
    return view('welcome', compact('sliders', 'categories'));
});

Route::get('/kurumsal', function () {
    $sections = \App\Models\CorporateSection::where('is_active', true)->orderBy('order')->get();
    return view('kurumsal', compact('sections'));
});

Route::get('/belgeler', function () {
    return view('belgeler');
});

Route::get('/urunler', function () {
    $categories = \App\Models\Category::where('is_active', true)->with(['products' => function($query) {
        $query->where('is_active', true)->with('images')->orderBy('id', 'desc');
    }])->orderBy('id', 'desc')->get();
    return view('urunler', compact('categories'));
});

Route::get('/api/products/{product}', function ($id) {
    $product = \App\Models\Product::with('specifications', 'images')->findOrFail($id);
    return response()->json($product);
});

Route::get('/sss', function () {
    $faqs = \App\Models\Faq::where('is_active', true)->orderBy('order')->get();
    return view('sss', compact('faqs'));
});

Route::get('/iletisim', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
Route::post('/iletisim', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

// Admin Routes
Route::middleware('guest')->prefix('dashboard')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'create'])->name('login');
    Route::post('login', [AdminLoginController::class, 'store']);
    Route::get('register', [AdminRegisterController::class, 'create'])->name('register');
    Route::post('register', [AdminRegisterController::class, 'store']);
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'admin'])->name('admin.dashboard');

// Admin Management Routes
Route::middleware(['auth', 'admin'])->prefix('dashboard')->name('admin.')->group(function () {
    Route::resource('sliders', \App\Http\Controllers\Admin\SliderController::class);
    
    Route::get('corporate-sections/vision-mission', [\App\Http\Controllers\Admin\CorporateSectionController::class, 'visionMission'])->name('corporate-sections.vision-mission');
    Route::put('corporate-sections/vision-mission', [\App\Http\Controllers\Admin\CorporateSectionController::class, 'updateVisionMission'])->name('corporate-sections.vision-mission.update');
    Route::get('corporate-sections/photos', [\App\Http\Controllers\Admin\CorporateSectionController::class, 'photos'])->name('corporate-sections.photos');
    Route::put('corporate-sections/photos', [\App\Http\Controllers\Admin\CorporateSectionController::class, 'updatePhotos'])->name('corporate-sections.photos.update');
    
    Route::resource('corporate-sections', \App\Http\Controllers\Admin\CorporateSectionController::class)->except(['show', 'create', 'store']);
    
    Route::resource('faqs', \App\Http\Controllers\Admin\FaqController::class);
    Route::get('contact-info/edit', [\App\Http\Controllers\Admin\ContactInfoController::class, 'edit'])->name('contact-info.edit');
    Route::put('contact-info', [\App\Http\Controllers\Admin\ContactInfoController::class, 'update'])->name('contact-info.update');
    Route::resource('contact-messages', \App\Http\Controllers\Admin\ContactMessageController::class)->only(['index', 'show', 'destroy']);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except(['show']);
    Route::delete('product-images/{productImage}', [\App\Http\Controllers\Admin\ProductImageController::class, 'destroy'])->name('product-images.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

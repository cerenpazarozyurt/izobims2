@extends('layouts.app')
<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes pulseGlow {

        0%,
        100% {
            filter: grayscale(100%);
            opacity: 0.6;
        }

        50% {
            filter: grayscale(0%);
            opacity: 1;
        }
    }

    @keyframes blob {

        0%,
        100% {
            transform: translate(0px, 0px) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes rotate3d {
        0% {
            transform: rotateX(0deg) rotateY(0deg);
        }

        100% {
            transform: rotateX(360deg) rotateY(360deg);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .animation-delay-200 {
        animation-delay: 0.2s;
    }

    .animation-delay-400 {
        animation-delay: 0.4s;
    }

    .animation-delay-50 {
        animation-delay: 0.05s;
    }

    .animation-delay-100 {
        animation-delay: 0.1s;
    }

    .animation-delay-150 {
        animation-delay: 0.15s;
    }

    .animation-delay-250 {
        animation-delay: 0.25s;
    }

    .animation-delay-300 {
        animation-delay: 0.3s;
    }

    .animation-delay-350 {
        animation-delay: 0.35s;
    }

    .animation-delay-450 {
        animation-delay: 0.45s;
    }

    .animation-delay-500 {
        animation-delay: 0.5s;
    }

    .animation-delay-550 {
        animation-delay: 0.55s;
    }

    .animation-delay-600 {
        animation-delay: 0.6s;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .slider-item {
        transition: opacity 1s ease-in-out;
    }

    .slider-item.active {
        opacity: 1;
    }

    .slider-dot {
        cursor: pointer;
    }

    .slider-dot.active {
        width: 2rem;
        background-color: white;
    }

    .animate-on-scroll {
        opacity: 0;
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .limited-width {
        max-width: 1400px;
        margin-left: auto;
        margin-right: auto;
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .slider-inner {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .slider-bg {
        position: absolute;
        top: -10%;
        left: -10%;
        width: 120%;
        height: 120%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        transform: scale(1.2);
        transition: transform 8s ease-out;
    }

    .overlay::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4));
        z-index: 1;
    }

    .overlay-dark::before {
        background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.5));
    }

    .slider-item.active .slider-bg {
        transform: scale(1) translateY(-20px);
    }

    .divider-m {
        height: 20px;
    }

    .slider-item:not(.active) .animate-fadeInUp {
        opacity: 0;
        transform: translateY(30px);
    }

    .slider-item.active .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .stat-card {
        animation: pulseGlow 2s ease-in-out infinite;
        transition: filter 0.3s ease, opacity 0.3s ease;
    }

    .stat-card:nth-child(1) {
        animation-delay: 0s;
    }

    .stat-card:nth-child(2) {
        animation-delay: 0.5s;
    }

    .stat-card:nth-child(3) {
        animation-delay: 1s;
    }

    .stat-card:nth-child(4) {
        animation-delay: 1.5s;
    }

    .stats-container:hover .stat-card {
        animation: none !important;
        filter: grayscale(100%) !important;
        opacity: 0.6 !important;
    }

    .stats-container:hover .stat-card:hover {
        filter: grayscale(0%) !important;
        opacity: 1 !important;
    }

    .stat-card:hover .bg-layer {
        transform: rotate(6deg) !important;
    }

    .stat-card:hover .card-content {
        transform: translateY(-8px) !important;
    }

    .stat-card:hover .icon-container {
        transform: scale(1.1) rotate(12deg) !important;
    }

    .category-item {
        transition: all 0.3s ease;
    }

    .category-item:hover {
        transform: translateX(8px);
    }

    .category-item.active {
        background: linear-gradient(to right, #10b981, #059669);
        color: white;
    }

    .product-grid {
        display: none !important;
        animation: fadeIn 0.5s ease-in;
    }

    .product-grid.active {
        display: grid !important;
    }

    .group:hover .text-gray-900 {
        color: #10b981 !important;
    }

    .group:hover .border-transparent {
        border-color: #10b981 !important;
    }

    .group:hover .text-green-600 {
        transform: translateX(8px);
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

@section('content')
    <!-- Hero Slider Section -->
    <section class="relative h-screen overflow-hidden">
        <!-- Slider Container -->
        <div id="hero-slider" class="relative h-full">
            @forelse($sliders as $index => $slider)
                <div
                    class="slider-item {{ $index === 0 ? 'active' : '' }} absolute inset-0 {{ $index === 0 ? '' : 'opacity-0' }}">
                    <div class="slider-inner">
                        <div class="slider-bg overlay overlay-dark"
                            style="background-image: url('{{ $slider->image ? asset('storage/' . $slider->image) : asset('assets/slider/slider1.png') }}');">
                        </div>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center" style="z-index: 2;">
                        <div class="container mx-auto px-4 text-center">
                            <div class="divider-m"></div>
                            <h1 class="text-5xl lg:text-7xl font-bold text-white mb-6 animate-fadeInUp">
                                @if ($slider->title1)
                                    <span class="block mb-2">{{ $slider->title1 }}</span>
                                @endif
                                @if ($slider->title2)
                                    <span class="text-green-400">{{ $slider->title2 }}</span>
                                @endif
                            </h1>
                            @if ($slider->description)
                                <p class="text-xl lg:text-2xl text-white/90 mb-8 animate-fadeInUp animation-delay-200">
                                    {!! nl2br(e($slider->description)) !!}
                                </p>
                            @endif
                            <div class="divider-m"></div>
                            @if ($slider->button_text && $slider->button_link)
                                <a href="{{ $slider->button_link }}"
                                    class="inline-flex items-center px-8 py-4 bg-green-500 hover:bg-green-600 text-white rounded-xl font-semibold shadow-2xl transition-all duration-300 transform hover:scale-105 animate-fadeInUp animation-delay-400">
                                    {{ $slider->button_text }}
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="slider-item active absolute inset-0">
                    <div class="slider-inner">
                        <div class="slider-bg overlay overlay-dark"
                            style="background-image: url('{{ asset('assets/slider/slider1.png') }}');"></div>
                    </div>
                </div>
            @endforelse
        </div>

        <button onclick="prevSlide()"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center transition-all">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button onclick="nextSlide()"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/20 hover:bg-white/30 backdrop-blur-sm rounded-full flex items-center justify-center transition-all">
            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>

        <!-- Slider Dots -->
        @if ($sliders->count() > 0)
            <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex space-x-3">
                @foreach ($sliders as $index => $slider)
                    <button onclick="goToSlide({{ $index }})"
                        class="slider-dot {{ $index === 0 ? 'active' : '' }} w-3 h-3 rounded-full {{ $index === 0 ? 'bg-white' : 'bg-white/50' }} transition-all"></button>
                @endforeach
            </div>
        @endif
    </section>

    <!-- Ürünlerimiz Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-blue-50 relative overflow-hidden">
        <!-- Decorative Elements -->
        <div
            class="absolute top-0 left-0 w-72 h-72 bg-green-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
        </div>
        <div
            class="absolute bottom-0 right-0 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <!-- Header -->
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <span
                        class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-green-100 px-4 py-2 rounded-full">
                        Ürünlerimiz
                    </span>
                </div>
                <h2 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6">
                    <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
                        Premium Kalite
                    </span>
                    <br />Bims Blokları
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Her ihtiyaca uygun geniş ürün yelpazemizle binanızı geleceğe taşıyoruz
                </p>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-12">
                <!-- Left Sidebar - Categories -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-green-500">
                            Ürün Kategorileri
                        </h3>
                        <ul class="space-y-2" id="categoryMenu">
                            @forelse($categories as $index => $category)
                                <li>
                                    <button onclick="showCategory('category-{{ $category->id }}')"
                                        class="category-item {{ $index === 0 ? 'active' : '' }} w-full text-left px-4 py-3 rounded-xl font-semibold {{ $index === 0 ? '' : 'text-gray-700 hover:bg-gray-100' }}">
                                        {{ $category->name }}
                                    </button>
                                </li>
                            @empty
                                <li class="text-gray-500 text-sm">Henüz kategori eklenmemiş.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <!-- Right Content - Products Grid -->
                <div class="lg:col-span-3">
                    @forelse($categories as $index => $category)
                        <div id="category-{{ $category->id }}"
                            class="product-grid {{ $index === 0 ? 'active' : '' }} grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                            style="display: {{ $index === 0 ? 'grid' : 'none' }};">
                            @forelse($category->products as $product)
                                <div class="group relative bg-white rounded-3xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 cursor-pointer"
                                    onclick="openProductModal({{ $product->id }})">
                                    <div class="relative h-64 overflow-hidden flex items-center justify-center bg-gray-100">
                                        @if ($product->images->first())
                                            <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                                alt="{{ $product->name }}"
                                                class="h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <img src="{{ asset('assets/urunler/izobims.png') }}"
                                                alt="{{ $product->name }}"
                                                class="h-full object-contain group-hover:scale-110 transition-transform duration-500">
                                        @endif
                                    </div>
                                    <div class="p-6">
                                        <h3
                                            class="text-2xl font-bold text-gray-900 mb-3 group-hover:text-green-600 transition-colors">
                                            {{ $product->name }}
                                        </h3>
                                        <div
                                            class="flex items-center text-green-600 font-semibold group-hover:translate-x-2 transition-transform">
                                            Detaylı İncele
                                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div
                                        class="absolute inset-0 border-4 border-transparent group-hover:border-green-400 rounded-3xl transition-all duration-500 pointer-events-none">
                                    </div>
                                </div>
                            @empty
                                <div class="col-span-3 text-center py-12 text-gray-500">
                                    Bu kategoride henüz ürün bulunmamaktadır.
                                </div>
                            @endforelse
                        </div>
                    @empty
                        <div class="text-center py-12 text-gray-500">
                            Henüz ürün eklenmemiş.
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Tüm Ürünler Button -->
            <div class="text-center">
                <a href="/urunler"
                    class="inline-flex items-center px-10 py-5 bg-gradient-to-r from-green-500 via-green-600 to-blue-600 text-white rounded-2xl font-bold text-lg shadow-2xl hover:shadow-green-500/50 transition-all duration-300 transform hover:scale-105 hover:-translate-y-1">
                    <span>Tüm Ürünleri Görüntüle</span>
                    <svg class="w-6 h-6 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Product Modal -->
    <div id="productModal" class="fixed inset-0 bg-black/70 z-50 hidden flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl max-w-6xl w-full max-h-[90vh] overflow-y-auto relative">
            <button onclick="closeProductModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 z-10">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div id="productModalContent" class="p-8">
                <div class="text-center py-12">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-green-600 mx-auto"></div>
                    <p class="mt-4 text-gray-600">Yükleniyor...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Product Modal Functions
        function openProductModal(productId) {
            const modal = document.getElementById('productModal');
            const modalContent = document.getElementById('productModalContent');

            modal.classList.remove('hidden');
            modal.classList.add('flex');

            modalContent.innerHTML = `
                <div class="text-center py-12">
                    <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-green-600 mx-auto"></div>
                    <p class="mt-4 text-gray-600">Yükleniyor...</p>
                </div>
            `;

            fetch(`/api/products/${productId}`)
                .then(response => response.json())
                .then(data => {
                    let specsHtml = '';
                    if (data.specifications && data.specifications.length > 0) {
                        specsHtml = `
                            <div class="bg-gray-50 rounded-2xl p-6">
                                <h3 class="text-2xl font-bold text-gray-900 mb-4">Ürün Özellikleri</h3>
                                <table class="w-full">
                                    <thead>
                                        <tr class="border-b-2 border-green-500">
                                            <th class="text-left py-3 px-4 text-gray-700 font-bold">Özellik</th>
                                            <th class="text-left py-3 px-4 text-gray-700 font-bold">Birim</th>
                                            <th class="text-left py-3 px-4 text-gray-700 font-bold">Değer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ${data.specifications.map(spec => `
                                                <tr class="border-b border-gray-200 hover:bg-white/50">
                                                    <td class="py-3 px-4 font-semibold text-gray-700">${spec.property_name}</td>
                                                    <td class="py-3 px-4 text-gray-600">${spec.unit || '-'}</td>
                                                    <td class="py-3 px-4 text-gray-900 font-bold">${spec.value}</td>
                                                </tr>
                                            `).join('')}
                                    </tbody>
                                </table>
                            </div>
                        `;
                    }

                    let imagesHtml = '';
                    if (data.images && data.images.length > 0) {
                        if (data.images.length > 1) {
                            // Slider için
                            imagesHtml = `
                                <div class="mb-4 relative">
                                    <div class="product-image-slider relative overflow-hidden rounded-2xl" style="height: 400px;">
                                        ${data.images.map((img, index) => `
                                                <div class="slider-image absolute inset-0 transition-opacity duration-500 ${index === 0 ? 'opacity-100' : 'opacity-0'}" data-index="${index}">
                                                    <img src="/storage/${img.image}" alt="${data.name}" class="w-full h-full object-contain bg-gray-50 rounded-2xl">
                                                </div>
                                            `).join('')}
                                    </div>
                                    <div class="flex justify-center mt-4 space-x-2">
                                        ${data.images.map((img, index) => `
                                                <button onclick="changeProductImage(${index})" class="product-slider-dot w-3 h-3 rounded-full ${index === 0 ? 'bg-green-600' : 'bg-gray-300'} transition-colors"></button>
                                            `).join('')}
                                    </div>
                                    <button onclick="previousProductImage()" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                                        </svg>
                                    </button>
                                    <button onclick="nextProductImage()" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-white/80 hover:bg-white rounded-full p-2 shadow-lg">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </button>
                                </div>
                            `;
                        } else {
                            imagesHtml = `
                                <div class="mb-4 relative">
                                    <div class="product-image-slider relative overflow-hidden rounded-2xl bg-gray-50" style="height: 400px;">
                                        <img src="/storage/${data.images[0].image}" alt="${data.name}" class="w-full h-full object-contain rounded-2xl">
                                    </div>
                                </div>
                            `;
                        }
                    }

                    modalContent.innerHTML = `
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="relative">
                                <h2 class="text-3xl font-bold text-gray-900 mb-4">${data.name}</h2>
                                ${imagesHtml}
                            </div>
                            <div>
                                ${specsHtml}
                            </div>
                        </div>
                    `;

                    // Slider değişkenlerini ayarla
                    if (data.images && data.images.length > 1) {
                        window.currentProductImageIndex = 0;
                        window.totalProductImages = data.images.length;
                    }
                })
                .catch(error => {
                    modalContent.innerHTML =
                        '<div class="text-center py-12 text-red-500">Ürün bilgileri yüklenirken bir hata oluştu.</div>';
                });
        }

        function closeProductModal() {
            document.getElementById('productModal').classList.add('hidden');
            document.getElementById('productModal').classList.remove('flex');
        }

        // Ürün resim slider fonksiyonları
        function changeProductImage(index) {
            const images = document.querySelectorAll('.slider-image');
            const dots = document.querySelectorAll('.product-slider-dot');

            images.forEach((img, i) => {
                if (i === index) {
                    img.classList.remove('opacity-0');
                    img.classList.add('opacity-100');
                } else {
                    img.classList.remove('opacity-100');
                    img.classList.add('opacity-0');
                }
            });

            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.remove('bg-gray-300');
                    dot.classList.add('bg-green-600');
                } else {
                    dot.classList.remove('bg-green-600');
                    dot.classList.add('bg-gray-300');
                }
            });

            window.currentProductImageIndex = index;
        }

        function nextProductImage() {
            if (window.totalProductImages) {
                const nextIndex = (window.currentProductImageIndex + 1) % window.totalProductImages;
                changeProductImage(nextIndex);
            }
        }

        function previousProductImage() {
            if (window.totalProductImages) {
                const prevIndex = (window.currentProductImageIndex - 1 + window.totalProductImages) % window
                    .totalProductImages;
                changeProductImage(prevIndex);
            }
        }

        // Modal dışına tıklayınca kapat
        document.getElementById('productModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeProductModal();
            }
        });

        // Category switching function
        function showCategory(categoryId) {
            // Tüm product-grid'leri gizle
            document.querySelectorAll('.product-grid').forEach(grid => {
                grid.style.display = 'none';
                grid.classList.remove('active');
            });

            // Seçilen kategoriyi göster
            const selectedGrid = document.getElementById(categoryId);
            if (selectedGrid) {
                selectedGrid.style.display = 'grid';
                selectedGrid.classList.add('active');
            }

            // Category menu'deki active class'ı güncelle
            document.querySelectorAll('.category-item').forEach(item => {
                item.classList.remove('active');
                item.classList.add('text-gray-700', 'hover:bg-gray-100');
            });

            // Tıklanan butonu active yap
            event.target.classList.add('active');
            event.target.classList.remove('text-gray-700', 'hover:bg-gray-100');
        }
    </script>

    <!-- Hakkımızda & İstatistikler Section-->
    <section class="py-20 bg-white relative overflow-hidden">

        <!-- Hakkımızda & İstatistikler Section -->
        <section class="py-20 bg-white relative overflow-hidden">
            <!-- 3D Background Elements -->
            <div
                class="absolute top-0 right-0 w-96 h-96 bg-green-100 rounded-full filter blur-3xl opacity-20 animate-pulse">
            </div>
            <div
                class="absolute bottom-0 left-0 w-96 h-96 bg-blue-100 rounded-full filter blur-3xl opacity-20 animate-pulse animation-delay-2000">
            </div>

            <div class="max-w-7xl mx-auto">
                <div class="stats-container grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Stat Card 1 -->
                    <div class="stat-card group relative h-full">
                        <div
                            class="bg-layer absolute inset-0 bg-gradient-to-br from-green-400 to-green-600 rounded-3xl transform rotate-3 transition-transform duration-300">
                        </div>
                        <div
                            class="card-content relative bg-white rounded-3xl p-8 shadow-xl transform transition-all duration-300 h-full flex flex-col justify-between min-h-[280px]">
                            <div
                                class="icon-container w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center mb-6 mx-auto transform transition-all duration-300 flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                            </div>
                            <div class="text-center flex-grow flex flex-col justify-center">
                                <div
                                    class="text-5xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-2">
                                    100%
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Memnuniyet</h3>
                                <p class="text-gray-600 text-sm">
                                    Müşteri memnuniyeti bizim için önemlidir
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Stat Card 2 -->
                    <div class="stat-card group relative h-full">
                        <div
                            class="bg-layer absolute inset-0 bg-gradient-to-br from-green-400 to-green-600 rounded-3xl transform rotate-3 transition-transform duration-300">
                        </div>
                        <div
                            class="card-content relative bg-white rounded-3xl p-8 shadow-xl transform transition-all duration-300 h-full flex flex-col justify-between min-h-[280px]">
                            <div
                                class="icon-container w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center mb-6 mx-auto transform transition-all duration-300 flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div class="text-center flex-grow flex flex-col justify-center">
                                <div
                                    class="text-5xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-2">
                                    60+
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Personel</h3>
                                <p class="text-gray-600 text-sm">
                                    Sizin için gece gündüz çalışıyoruz
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Stat Card 3 -->
                    <div class="stat-card group relative h-full">
                        <div
                            class="bg-layer absolute inset-0 bg-gradient-to-br from-green-400 to-green-600 rounded-3xl transform rotate-3 transition-transform duration-300">
                        </div>
                        <div
                            class="card-content relative bg-white rounded-3xl p-8 shadow-xl transform transition-all duration-300 h-full flex flex-col justify-between min-h-[280px]">
                            <div
                                class="icon-container w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center mb-6 mx-auto transform transition-all duration-300 flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="text-center flex-grow flex flex-col justify-center">
                                <div
                                    class="text-5xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-2">
                                    50+
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Sevkiyat Noktası</h3>
                                <p class="text-gray-600 text-sm">
                                    Türkiye'nin her yerine sorunsuz teslimat
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Stat Card 4 -->
                    <div class="stat-card group relative h-full">
                        <div
                            class="bg-layer absolute inset-0 bg-gradient-to-br from-green-400 to-green-600 rounded-3xl transform rotate-3 transition-transform duration-300">
                        </div>
                        <div
                            class="card-content relative bg-white rounded-3xl p-8 shadow-xl transform transition-all duration-300 h-full flex flex-col justify-between min-h-[280px]">
                            <div
                                class="icon-container w-16 h-16 bg-gradient-to-br from-green-500 to-green-700 rounded-2xl flex items-center justify-center mb-6 mx-auto transform transition-all duration-300 flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div class="text-center flex-grow flex flex-col justify-center">
                                <div
                                    class="text-5xl font-bold bg-gradient-to-r from-green-600 to-green-800 bg-clip-text text-transparent mb-2">
                                    20+
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">Ürün Çeşidi</h3>
                                <p class="text-gray-600 text-sm">
                                    Her ihtiyaca göre özel üretim blokları
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- İzoBims Nedir Section -->
        <section class="py-20 bg-gradient-to-br from-green-50 to-blue-50 relative overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute inset-0 opacity-30">
                <div class="absolute top-20 left-20 w-64 h-64 bg-green-300 rounded-full filter blur-3xl animate-blob">
                </div>
                <div
                    class="absolute bottom-20 right-20 w-64 h-64 bg-blue-300 rounded-full filter blur-3xl animate-blob animation-delay-2000">
                </div>
            </div>

            <div class="limited-width relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
                    <!-- Left: Content -->
                    <div class="animate-on-scroll">
                        <div class="inline-block mb-4">
                            <span
                                class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-white px-4 py-2 rounded-full shadow-lg">
                                İnovatif Çözüm
                            </span>
                        </div>
                        <h2 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6">
                            <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
                                İzobims
                            </span>
                            <br />Nedir?
                        </h2>
                        <p class="text-lg text-gray-700 mb-6 leading-relaxed">
                            İzobims, yüksek yalıtım performansı ve dayanıklılığı bir araya getiren yenilikçi yapı
                            malzemesidir.
                            Hafif yapısı, mükemmel ısı ve ses yalıtımı özellikleri ile modern inşaat sektörünün vazgeçilmez
                            ürünüdür.
                        </p>
                        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
                            Çevre dostu üretim süreçleri ve depreme dayanıklı yapısı ile binanıza değer katar. Kolay
                            uygulanabilir olması sayesinde inşaat süreçlerini hızlandırır ve maliyetleri optimize eder.
                        </p>
                        <a href="#"
                            class="inline-flex items-center px-8 py-4 bg-gradient-to-r from-green-500 via-green-600 to-blue-600 text-white rounded-xl font-bold shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            Detaylı Bilgi
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                    </div>

                    <!-- Right: 3D Visual -->
                    <div class="relative animate-on-scroll">
                        <div class="relative w-full h-96 lg:h-[500px]">
                            <!-- 3D Cube Effect -->
                            <div class="absolute inset-0 flex items-center justify-center">
                                <div class="relative w-80 h-80 transform-gpu"
                                    style="transform-style: preserve-3d; animation: rotate3d 20s infinite linear;">
                                    <!-- Front Face -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-green-400 to-green-600 rounded-3xl shadow-2xl flex items-center justify-center"
                                        style="transform: translateZ(80px);">
                                        <svg class="w-32 h-32 text-white/50" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                        </svg>
                                    </div>
                                    <!-- Back Face -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-blue-400 to-blue-600 rounded-3xl shadow-2xl"
                                        style="transform: translateZ(-80px) rotateY(180deg);"></div>
                                    <!-- Right Face -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-purple-400 to-purple-600 rounded-3xl shadow-2xl"
                                        style="transform: rotateY(90deg) translateZ(80px);"></div>
                                    <!-- Left Face -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-pink-400 to-pink-600 rounded-3xl shadow-2xl"
                                        style="transform: rotateY(-90deg) translateZ(80px);"></div>
                                    <!-- Top Face -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-yellow-400 to-orange-600 rounded-3xl shadow-2xl"
                                        style="transform: rotateX(90deg) translateZ(80px);"></div>
                                    <!-- Bottom Face -->
                                    <div class="absolute inset-0 bg-gradient-to-br from-teal-400 to-cyan-600 rounded-3xl shadow-2xl"
                                        style="transform: rotateX(-90deg) translateZ(80px);"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bims Özellikleri -->
                <div class="text-center mb-16">
                    <h3 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">
                        <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
                            Bims Özellikleri
                        </span>
                    </h3>
                    <p class="text-xl text-gray-600">
                        Neden İzobims tercih edilmeli?
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Feature 1 -->
                    <div class="group relative animate-on-scroll">
                        <div
                            class="relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 h-full flex flex-col">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                </svg>
                            </div>
                            <h4
                                class="text-lg font-bold text-gray-900 text-center mb-2 group-hover:text-green-600 transition-colors flex-shrink-0">
                                Özel Tasarım
                            </h4>
                            <p class="text-gray-600 text-center text-sm flex-grow">
                                Müşterilerinizin takip etmesine izin verin ve sürecinizi anlayın
                            </p>
                        </div>
                    </div>

                    <!-- Feature 2 -->
                    <div class="group relative animate-on-scroll animation-delay-100">
                        <div
                            class="relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 h-full flex flex-col">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                </svg>
                            </div>
                            <h4
                                class="text-lg font-bold text-gray-900 text-center mb-2 group-hover:text-green-600 transition-colors flex-shrink-0">
                                Yalıtım
                            </h4>
                            <p class="text-gray-600 text-center text-sm flex-grow">
                                Ses ve ısı yalıtımı görevlerini yapar
                            </p>
                        </div>
                    </div>

                    <!-- Feature 3 -->
                    <div class="group relative animate-on-scroll animation-delay-200">
                        <div
                            class="relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 h-full flex flex-col">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h4
                                class="text-lg font-bold text-gray-900 text-center mb-2 group-hover:text-green-600 transition-colors flex-shrink-0">
                                Dayanıklı
                            </h4>
                            <p class="text-gray-600 text-center text-sm flex-grow">
                                Yangına ve depreme dayanıklıdır
                            </p>
                        </div>
                    </div>

                    <!-- Feature 4 -->
                    <div class="group relative animate-on-scroll animation-delay-300">
                        <div
                            class="relative bg-white rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 h-full flex flex-col">
                            <div
                                class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-700 rounded-xl flex items-center justify-center mb-4 mx-auto group-hover:scale-110 transition-transform flex-shrink-0">
                                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                </svg>
                            </div>
                            <h4
                                class="text-lg font-bold text-gray-900 text-center mb-2 group-hover:text-green-600 transition-colors flex-shrink-0">
                                Kolay Uygulama
                            </h4>
                            <p class="text-gray-600 text-center text-sm flex-grow">
                                Ustalar tarafından kolayca uygulanır
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 12 Özellikler Grid Section -->
        <section class="py-20 bg-white relative overflow-hidden">
            <div
                style="max-width: 1400px; margin-left: auto; margin-right: auto; padding-left: 1rem; padding-right: 1rem;">
                <div class="text-center mb-16 animate-on-scroll">
                    <div class="inline-block mb-4">
                        <span
                            class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-green-100 px-4 py-2 rounded-full">
                            Üstün Özellikler
                        </span>
                    </div>
                    <h2 class="text-4xl lg:text-6xl font-bold text-gray-900 mb-6">
                        Neden
                        <span class="bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent">
                            İzobims?
                        </span>
                    </h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        12 farklı avantajı ile yapılarınızı güvence altına alın
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Feature Card 1 -->
                    <div class="group relative animate-on-scroll">
                        <div
                            class="relative bg-gradient-to-br from-white to-green-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-green-500/10 rounded-full -mr-10 -mt-10"></div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-green-400 to-green-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-green-600 transition-colors">
                                    Kaliteli Hammadde
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 2 -->
                    <div class="group relative animate-on-scroll animation-delay-50">
                        <div
                            class="relative bg-gradient-to-br from-white to-blue-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-blue-500/10 rounded-full -mr-10 -mt-10"></div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-blue-600 transition-colors">
                                    Depreme Dayanıklı
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 3 -->
                    <div class="group relative animate-on-scroll animation-delay-100">
                        <div
                            class="relative bg-gradient-to-br from-white to-purple-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-purple-500/10 rounded-full -mr-10 -mt-10">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-purple-400 to-purple-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20H7m6 0a6 6 0 01-6-6V9a6 6 0 016-6v0" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-purple-600 transition-colors">
                                    Çevre Dostu
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 4 -->
                    <div class="group relative animate-on-scroll animation-delay-150">
                        <div
                            class="relative bg-gradient-to-br from-white to-orange-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-orange-500/10 rounded-full -mr-10 -mt-10">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-orange-400 to-orange-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-orange-600 transition-colors">
                                    Yangına Dayanıklı
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 5 -->
                    <div class="group relative animate-on-scroll animation-delay-200">
                        <div
                            class="relative bg-gradient-to-br from-white to-teal-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-teal-500/10 rounded-full -mr-10 -mt-10"></div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-teal-400 to-teal-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-teal-600 transition-colors">
                                    Hafif Yapı
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 6 -->
                    <div class="group relative animate-on-scroll animation-delay-250">
                        <div
                            class="relative bg-gradient-to-br from-white to-pink-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-pink-500/10 rounded-full -mr-10 -mt-10"></div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-pink-400 to-pink-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-pink-600 transition-colors">
                                    Mükemmel Yalıtım
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 7 -->
                    <div class="group relative animate-on-scroll animation-delay-300">
                        <div
                            class="relative bg-gradient-to-br from-white to-indigo-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-indigo-500/10 rounded-full -mr-10 -mt-10">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-indigo-600 transition-colors">
                                    Ekonomik
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 8 -->
                    <div class="group relative animate-on-scroll animation-delay-350">
                        <div
                            class="relative bg-gradient-to-br from-white to-red-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-red-500/10 rounded-full -mr-10 -mt-10"></div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-red-400 to-red-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-red-600 transition-colors">
                                    Hızlı Montaj
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 9 -->
                    <div class="group relative animate-on-scroll animation-delay-400">
                        <div
                            class="relative bg-gradient-to-br from-white to-yellow-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-yellow-500/10 rounded-full -mr-10 -mt-10">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728m-.9-10.607a3 3 0 010 4.242M9.172 9.172A4 4 0 005.004 12a4 4 0 104.172 4.172m0-8.344a6 6 0 010 8.688" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-yellow-600 transition-colors">
                                    Ses Yalıtımı
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 10 -->
                    <div class="group relative animate-on-scroll animation-delay-450">
                        <div
                            class="relative bg-gradient-to-br from-white to-cyan-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-cyan-500/10 rounded-full -mr-10 -mt-10"></div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-cyan-400 to-cyan-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-cyan-600 transition-colors">
                                    Uzun Ömürlü
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 11 -->
                    <div class="group relative animate-on-scroll animation-delay-500">
                        <div
                            class="relative bg-gradient-to-br from-white to-lime-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-lime-500/10 rounded-full -mr-10 -mt-10"></div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-lime-400 to-lime-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-lime-600 transition-colors">
                                    Nem Geçirmez
                                </h4>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 12 -->
                    <div class="group relative animate-on-scroll animation-delay-550">
                        <div
                            class="relative bg-gradient-to-br from-white to-emerald-50 rounded-2xl p-6 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 overflow-hidden">
                            <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-500/10 rounded-full -mr-10 -mt-10">
                            </div>
                            <div class="relative">
                                <div
                                    class="w-16 h-16 bg-gradient-to-br from-emerald-400 to-emerald-600 rounded-xl mb-4 mx-auto flex items-center justify-center">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4m7 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <h4
                                    class="text-center font-bold text-gray-900 text-sm group-hover:text-emerald-600 transition-colors">
                                    Garantili
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-gradient-to-r from-green-500 via-green-600 to-blue-600 relative overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse"></div>
                <div
                    class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full filter blur-3xl animate-pulse animation-delay-2000">
                </div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center max-w-4xl mx-auto animate-on-scroll">
                    <h2 class="text-4xl lg:text-6xl font-bold text-white mb-6">
                        Projeniz İçin
                        <br />
                        <span class="text-green-200">Hemen Başlayın</span>
                    </h2>
                    <p class="text-xl text-white/90 mb-8 leading-relaxed">
                        Uzman ekibimiz size en uygun yalıtım çözümünü bulmak için hazır. Ücretsiz keşif ve danışmanlık
                        hizmeti
                        için hemen iletişime geçin.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ url('/iletisim') }}"
                            class="group px-10 py-5 bg-white text-green-600 rounded-2xl font-bold text-lg shadow-2xl hover:shadow-white/50 transition-all duration-300 transform hover:scale-105 flex items-center justify-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>Ücretsiz Teklif Alın</span>
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />
                            </svg>
                        </a>
                        <a href="tel:+902121234567"
                            class="px-10 py-5 border-2 border-white text-white rounded-2xl font-bold text-lg hover:bg-white hover:text-green-600 transition-all duration-300 transform hover:scale-105 flex items-center justify-center">
                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>(0212) 123 45 67</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Slider JavaScript -->
        <script>
            let currentSlide = 0;
            const slides = document.querySelectorAll('.slider-item');
            const dots = document.querySelectorAll('.slider-dot');
            let slideInterval;

            function showSlide(index) {
                slides.forEach(slide => {
                    slide.classList.remove('active');
                    slide.style.opacity = '0';
                });

                dots.forEach(dot => {
                    dot.classList.remove('active');
                    dot.classList.add('bg-white/50');
                    dot.classList.remove('bg-white');
                });

                slides[index].classList.add('active');
                slides[index].style.opacity = '1';
                dots[index].classList.add('active');
                dots[index].classList.remove('bg-white/50');
                dots[index].classList.add('bg-white');
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % slides.length;
                showSlide(currentSlide);
            }

            function prevSlide() {
                currentSlide = (currentSlide - 1 + slides.length) % slides.length;
                showSlide(currentSlide);
            }

            function goToSlide(index) {
                currentSlide = index;
                showSlide(currentSlide);
                resetInterval();
            }

            function startSlideShow() {
                slideInterval = setInterval(nextSlide, 5000);
            }

            function resetInterval() {
                clearInterval(slideInterval);
                startSlideShow();
            }

            // Start slideshow on page load
            document.addEventListener('DOMContentLoaded', function() {
                showSlide(0);
                startSlideShow();

                // Pause on hover
                const sliderContainer = document.getElementById('hero-slider');
                sliderContainer.addEventListener('mouseenter', () => {
                    clearInterval(slideInterval);
                });
                sliderContainer.addEventListener('mouseleave', () => {
                    startSlideShow();
                });
            });

            // Scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-up');
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });

            function showCategory(categoryId) {
                // Tüm ürün gridlerini gizle
                document.querySelectorAll('.product-grid').forEach(grid => {
                    grid.classList.remove('active');
                    grid.style.display = 'none';
                });

                // Seçilen kategoriyi göster
                const selectedGrid = document.getElementById(categoryId);
                if (selectedGrid) { 
                    selectedGrid.classList.add('active');
                    selectedGrid.style.display = 'grid';
                }

                // Menüde aktif durumu güncelle
                document.querySelectorAll('.category-item').forEach(item => {
                    item.classList.remove('active');
                    item.classList.add('text-gray-700', 'hover:bg-gray-100');
                    item.style.background = '';
                    item.style.color = '';
                });

                // Tıklanan öğeyi aktif yap
                event.target.classList.add('active');
                event.target.classList.remove('text-gray-700', 'hover:bg-gray-100');
            }
        </script>
    @endsection

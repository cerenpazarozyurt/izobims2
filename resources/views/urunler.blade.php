@extends('layouts.app')

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-60px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
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

    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animate-on-scroll {
        opacity: 0;
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .delay-100 {
        animation-delay: 0.1s;
    }

    .delay-200 {
        animation-delay: 0.2s;
    }

    .delay-300 {
        animation-delay: 0.3s;
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

    .product-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }

    .product-card:hover .product-image img {
        transform: scale(1.1);
    }

    .product-image img {
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
        animation: fadeIn 0.3s ease;
        overflow-y: auto;
    }

    .modal.active {
        display: flex;
        align-items: center;
        justify-center;
        padding: 2rem;
    }

    .modal-content {
        background: white;
        border-radius: 2rem;
        max-width: 900px;
        width: 100%;
        max-height: 90vh;
        overflow-y: auto;
        animation: slideUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(60px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .product-grid {
        display: none;
    }

    .product-grid.active {
        display: grid;
        animation: fadeIn 0.5s ease-in;
    }

    .gradient-text {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
</style>

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[65vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/kurumsal/bimsblok.jpeg') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-gray-900/90 via-gray-800/85 to-green-900/90"></div>
        </div>

        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-20 w-72 h-72 bg-green-500 rounded-full filter blur-3xl animate-blob"></div>
            <div
                class="absolute bottom-20 right-20 w-72 h-72 bg-blue-500 rounded-full filter blur-3xl animate-blob delay-200">
            </div>
        </div>

        <div class="relative h-full flex items-center justify-center pt-16">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <div class="animate-fadeInUp">
                    <span
                        class="inline-block mb-4 text-green-400 font-semibold text-sm uppercase tracking-wider bg-green-900/30 px-4 py-2 rounded-full border border-green-500/30">
                        Ürünlerimiz
                    </span>
                </div>
                <h1 class="text-5xl lg:text-7xl font-bold text-white mb-6 animate-fadeInUp delay-100">
                    Premium Kalite
                    <span class="block mt-2 text-green-400">Bims Blokları</span>
                </h1>
                <p class="text-xl lg:text-2xl text-gray-300 max-w-4xl mx-auto leading-relaxed animate-fadeInUp delay-200">
                    Her ihtiyaca uygun geniş ürün yelpazemiz ile binanızı geleceğe taşıyoruz
                </p>
            </div>
        </div>
    </section>

    <!-- Ürünler Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-green-50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-green-500 rounded-full filter blur-3xl animate-blob"></div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl animate-blob delay-300">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <!-- Header -->
            <div class="text-center mb-16 animate-on-scroll">
                <div class="inline-block mb-4">
                    <span
                        class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-white px-4 py-2 rounded-full shadow-lg">
                        Ürün Kataloğu
                    </span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Kalite ve
                    <span class="gradient-text">Çeşitlilik</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Tüm inşaat ihtiyaçlarınız için özel olarak tasarlanmış bims blokları
                </p>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Left Sidebar - Categories -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl p-6 sticky top-24">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 pb-4 border-b-2 border-green-500">
                            Ürün Kategorileri
                        </h3>
                        <ul class="space-y-2" id="categoryMenu">
                            @forelse($categories as $index => $category)
                                <li>
                                    <button onclick="showCategory({{ $category->id }})"
                                        class="category-item {{ $index === 0 ? 'active' : '' }} w-full text-left px-4 py-3 rounded-xl font-semibold {{ $index === 0 ? 'bg-green-50 text-green-700' : 'text-gray-700 hover:bg-gray-100' }}">
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
                                <div class="product-card bg-white rounded-3xl overflow-hidden shadow-xl cursor-pointer hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2"
                                    onclick="openProductModal({{ $product->id }})">
                                    <div
                                        class="product-image relative h-64 overflow-hidden flex items-center justify-center bg-gray-100">
                                        @if ($product->images->count() > 0)
                                            <img src="{{ asset('storage/' . $product->images->first()->image) }}"
                                                alt="{{ $product->name }}" class="h-full object-contain">
                                        @else
                                            <img src="{{ asset('assets/urunler/izobims.png') }}"
                                                alt="{{ $product->name }}" class="h-full object-contain">
                                        @endif
                                    </div>
                                    <div class="p-6">
                                        <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $product->name }}</h3>
                                        <div class="flex items-center text-green-600 font-semibold">
                                            Detaylı İncele
                                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </div>
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
        </div>
        </div>
    </section>

    <!-- Product Modal -->
    <div id="productModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center p-4"
        style="display: none;">
        <div class="bg-white rounded-3xl max-w-4xl w-full max-h-[90vh] overflow-y-auto relative">
            <button onclick="closeProductModal()" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <div id="modalContent" class="p-8">
                <!-- Modal içeriği -->
            </div>
        </div>
    </div>

    <script>
        // Kategori değiştirme
        function showCategory(categoryId) {
            // Tüm kategorileri gizle
            document.querySelectorAll('.product-grid').forEach(grid => {
                grid.style.display = 'none';
            });

            // Seçili kategoriyi göster
            const selectedGrid = document.getElementById('category-' + categoryId);
            if (selectedGrid) {
                selectedGrid.style.display = 'grid';
            }

            // Tüm kategori butonlarını pasif yap
            document.querySelectorAll('.category-item').forEach(item => {
                item.classList.remove('active', 'bg-green-50', 'text-green-700');
                item.classList.add('text-gray-700');
            });

            // Seçili kategori butonunu aktif yap
            event.target.classList.add('active', 'bg-green-50', 'text-green-700');
            event.target.classList.remove('text-gray-700');
        }

        // Ürün modal'ını aç
        function openProductModal(productId) {
            const modal = document.getElementById('productModal');
            const modalContent = document.getElementById('modalContent');

            // Loading göster
            modalContent.innerHTML = '<div class="text-center py-12">Yükleniyor...</div>';
            modal.style.display = 'flex';

            // Ürün bilgilerini AJAX ile yükle
            fetch(`/api/products/${productId}`)
                .then(response => response.json())
                .then(data => {
                    let specsHtml = '';
                    if (data.specifications && data.specifications.length > 0) {
                        specsHtml = `
                            <div class="mt-6">
                                <h3 class="text-2xl font-bold text-gray-900 mb-4">Ürün Özellikleri</h3>
                                <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-2xl p-6">
                                    <table class="w-full">
                                        <thead>
                                            <tr class="border-b-2 border-green-500">
                                                <th class="text-left py-3 px-4 font-bold text-gray-900">Özellik</th>
                                                <th class="text-left py-3 px-4 font-bold text-gray-900">Birim</th>
                                                <th class="text-left py-3 px-4 font-bold text-gray-900">Değer</th>
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
                            // Tek resim için aynı boyutta göster
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

        // Modal'ı kapat
        function closeProductModal() {
            document.getElementById('productModal').style.display = 'none';
        }

        // Modal dışına tıklayınca kapat
        document.getElementById('productModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeProductModal();
            }
        });

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
    </script>
@endsection

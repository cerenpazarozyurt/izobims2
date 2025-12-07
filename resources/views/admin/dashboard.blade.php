<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-6">
            <div class="flex justify-between items-center">
                <h2 class="text-3xl font-bold text-gray-900">
                    {{ __('Yönetici Paneli') }}
                </h2>
                <span class="text-sm text-gray-600">
                    Hoş geldiniz, <span class="font-semibold">{{ Auth::user()->name }}</span>
                </span>
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- İstatistik Kartları -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <!-- Yöneticiler -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Yöneticiler</p>
                                <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\User::where('is_admin', true)->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Son Giriş -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-orange-500 rounded-md p-3">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500">Son Giriş</p>
                                <p class="text-lg font-semibold text-gray-900">{{ now()->format('d.m.Y') }}</p>
                                <p class="text-xs text-gray-500">{{ now()->format('H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ana İçerik -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Hoş Geldiniz Kartı -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-gradient-to-br from-blue-500 to-blue-700 text-white">
                        <h3 class="text-xl font-bold mb-2">Hoş Geldiniz!</h3>
                        <p class="text-blue-100">
                            İZOBİMS yönetici paneline hoş geldiniz. Buradan sistem yönetimi yapabilirsiniz.
                        </p>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Email:</span>
                                <span class="font-semibold">{{ Auth::user()->email }}</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Yetki:</span>
                                <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-semibold">
                                    Yönetici
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-600">Kayıt Tarihi:</span>
                                <span class="font-semibold">{{ Auth::user()->created_at->format('d.m.Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hızlı İşlemler -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Yönetim Menüsü</h3>
                        <div class="space-y-3">
                            <a href="{{ route('admin.sliders.index') }}" class="block w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition duration-150">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Slider Yönetimi</span>
                                </div>
                            </a>
                            <a href="{{ route('admin.corporate-sections.vision-mission') }}" class="block w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition duration-150">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Vizyon/Misyon</span>
                                </div>
                            </a>
                            <a href="{{ route('admin.corporate-sections.photos') }}" class="block w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition duration-150">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Kurumsal Fotoğraflar</span>
                                </div>
                            </a>
                            <a href="{{ route('admin.faqs.index') }}" class="block w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition duration-150">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">SSS Yönetimi</span>
                                </div>
                            </a>
                            <a href="{{ route('admin.contact-info.edit') }}" class="block w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition duration-150">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">İletişim Bilgileri</span>
                                </div>
                            </a>
                            <a href="{{ route('admin.contact-messages.index') }}" class="block w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition duration-150">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">İletişim Mesajları</span>
                                </div>
                            </a>
                            <a href="{{ route('admin.categories.index') }}" class="block w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition duration-150">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Kategoriler</span>
                                </div>
                            </a>
                            <a href="{{ route('admin.products.index') }}" class="block w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition duration-150">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Ürünler</span>
                                </div>
                            </a>
                            <a href="/" class="block w-full px-4 py-3 bg-gray-50 hover:bg-gray-100 rounded-lg transition duration-150">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">Ana Sayfaya Dön</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>


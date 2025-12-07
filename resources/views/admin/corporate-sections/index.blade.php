<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6">
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Kurumsal Yönetimi</h2>
                <p class="text-gray-600">Kurumsal sayfa içeriğini yönetmek için aşağıdaki seçeneklerden birini seçin.</p>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Vizyon/Misyon Kartı -->
                <a href="{{ route('admin.corporate-sections.vision-mission') }}" class="block bg-white shadow-sm rounded-lg p-6 hover:shadow-lg transition-shadow border-2 border-transparent hover:border-green-500">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <h3 class="ml-4 text-xl font-bold text-gray-900">Vizyon & Misyon</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Kurumsal sayfasındaki vizyon ve misyon metinlerini düzenleyin.</p>
                    <span class="text-green-600 font-semibold inline-flex items-center">
                        Düzenle
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </a>

                <!-- Fotoğraflar Kartı -->
                <a href="{{ route('admin.corporate-sections.photos') }}" class="block bg-white shadow-sm rounded-lg p-6 hover:shadow-lg transition-shadow border-2 border-transparent hover:border-purple-500">
                    <div class="flex items-center mb-4">
                        <div class="flex-shrink-0 w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h3 class="ml-4 text-xl font-bold text-gray-900">Fotoğraflar</h3>
                    </div>
                    <p class="text-gray-600 mb-4">Kurumsal sayfasındaki fotoğrafları ve üzerlerindeki metinleri yönetin.</p>
                    <span class="text-purple-600 font-semibold inline-flex items-center">
                        Düzenle
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</x-admin-layout>


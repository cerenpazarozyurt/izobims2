<x-admin-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Kurumsal Fotoğraf Yönetimi</h2>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.corporate-sections.photos.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Sağlıklı Yaşam Fotoğrafı -->
                    <div class="mb-8 p-6 bg-green-50 rounded-lg border border-green-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Sağlıklı Yaşam Bölümü Fotoğrafı</h3>
                        
                        @if($healthyLife && $healthyLife->image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Mevcut Fotoğraf</label>
                                <img src="{{ asset('storage/' . $healthyLife->image) }}" alt="Sağlıklı Yaşam" class="h-64 w-full object-cover rounded-lg mb-2">
                            </div>
                        @endif

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Yeni Fotoğraf (Değiştirmek için)</label>
                            <input type="file" name="healthy_life_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>
                    </div>

                    <!-- Neden İzobims Fotoğrafı -->
                    <div class="mb-8 p-6 bg-blue-50 rounded-lg border border-blue-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Neden İzobims Bölümü</h3>
                        
                        @if($whyIzobims && $whyIzobims->image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Mevcut Fotoğraf</label>
                                <img src="{{ asset('storage/' . $whyIzobims->image) }}" alt="Neden İzobims" class="h-64 w-full object-cover rounded-lg mb-2">
                            </div>
                        @endif

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Yeni Fotoğraf (Değiştirmek için)</label>
                            <input type="file" name="why_izobims_image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Fotoğraf Üzerindeki Başlık</label>
                            <input type="text" name="why_izobims_title" value="{{ old('why_izobims_title', $whyIzobims->title ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Örn: Modern Üretim Tesisimiz">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Fotoğraf Üzerindeki Metin</label>
                            <textarea name="why_izobims_content" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Örn: Son teknoloji ile donatılmış fabrikamızda günlük yüksek kapasitede üretim yapıyoruz">{{ old('why_izobims_content', $whyIzobims->content ?? '') }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('admin.corporate-sections.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Geri</a>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>


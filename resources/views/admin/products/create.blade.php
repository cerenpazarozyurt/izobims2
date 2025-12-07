<x-admin-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Yeni Ürün Ekle</h2>

                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Kategori *</label>
                        <select name="category_id" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <option value="">Kategori Seçin</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <a href="{{ route('admin.categories.create') }}" class="mt-2 text-sm text-blue-600 hover:text-blue-800 inline-flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Yeni Kategori Ekle
                        </a>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ürün Adı *</label>
                        <input type="text" name="name" value="{{ old('name') }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Ürün Fotoğrafları (Birden fazla seçebilirsiniz)</label>
                        <input type="file" name="images[]" accept="image/*" multiple class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                        <p class="mt-1 text-xs text-gray-500">Birden fazla resim seçmek için Ctrl (Windows) veya Cmd (Mac) tuşuna basılı tutarak tıklayın.</p>
                        @error('images.*')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="flex items-center">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            <span class="ml-2 text-sm text-gray-700">Aktif</span>
                        </label>
                    </div>

                    <!-- Ürün Özellikleri -->
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <label class="block text-sm font-medium text-gray-700">Ürün Özellikleri</label>
                            <button type="button" onclick="addSpecification()" class="text-sm bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg">
                                + Özellik Ekle
                            </button>
                        </div>
                        <div id="specifications-container" class="space-y-3">
                            <!-- Özellikler buraya eklenecek -->
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">İptal</a>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        let specIndex = 0;

        function addSpecification(propertyName = '', unit = '', value = '') {
            const container = document.getElementById('specifications-container');
            const specDiv = document.createElement('div');
            specDiv.className = 'flex gap-3 items-start p-4 bg-gray-50 rounded-lg';
            specDiv.innerHTML = `
                <div class="flex-1">
                    <input type="text" name="specifications[${specIndex}][property_name]" value="${propertyName}" placeholder="Özellik Adı (örn: EN)" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 mb-2">
                </div>
                <div class="w-32">
                    <input type="text" name="specifications[${specIndex}][unit]" value="${unit}" placeholder="Birim (örn: mm)" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 mb-2">
                </div>
                <div class="flex-1">
                    <input type="text" name="specifications[${specIndex}][value]" value="${value}" placeholder="Değer (örn: 100)" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 mb-2">
                </div>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800 px-3 py-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            `;
            container.appendChild(specDiv);
            specIndex++;
        }

        // Sayfa yüklendiğinde bir boş özellik ekle
        document.addEventListener('DOMContentLoaded', function() {
            addSpecification();
        });
    </script>
</x-admin-layout>


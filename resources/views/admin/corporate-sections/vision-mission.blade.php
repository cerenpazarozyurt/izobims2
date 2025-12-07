<x-admin-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Vizyon ve Misyon Düzenle</h2>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.corporate-sections.vision-mission.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Vizyon -->
                    <div class="mb-8 p-6 bg-green-50 rounded-lg border border-green-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Vizyon</h3>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Başlık</label>
                            <input type="text" name="vision_title" value="{{ old('vision_title', $vision->title ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">İçerik</label>
                            <textarea name="vision_content" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('vision_content', $vision->content ?? '') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Vurgulu Metin (Alt kısımda gösterilecek)</label>
                            <input type="text" name="vision_highlighted" value="{{ old('vision_highlighted', $vision->highlighted_text ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                    </div>

                    <!-- Misyon -->
                    <div class="mb-8 p-6 bg-blue-50 rounded-lg border border-blue-200">
                        <h3 class="text-xl font-bold text-gray-900 mb-4">Misyon</h3>
                        
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Başlık</label>
                            <input type="text" name="mission_title" value="{{ old('mission_title', $mission->title ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">İçerik</label>
                            <textarea name="mission_content" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('mission_content', $mission->content ?? '') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Vurgulu Metin (Alt kısımda gösterilecek)</label>
                            <input type="text" name="mission_highlighted" value="{{ old('mission_highlighted', $mission->highlighted_text ?? '') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500">
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


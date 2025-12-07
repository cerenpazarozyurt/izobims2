<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">Slider Yönetimi</h2>
                <a href="{{ route('admin.sliders.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                    Yeni Slider Ekle
                </a>
            </div>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Görsel</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Başlık 1</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Başlık 2</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Sıra</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Durum</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($sliders as $slider)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($slider->image)
                                        <img src="{{ asset('storage/' . $slider->image) }}" alt="Slider" class="h-16 w-32 object-cover rounded">
                                    @else
                                        <span class="text-gray-400">Görsel yok</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $slider->title1 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $slider->title2 }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $slider->order }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full {{ $slider->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $slider->is_active ? 'Aktif' : 'Pasif' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.sliders.edit', $slider) }}" class="text-blue-600 hover:text-blue-900 mr-3">Düzenle</a>
                                    <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 delete-btn">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">Henüz slider eklenmemiş.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>


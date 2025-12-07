<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-gray-900">İletişim Mesajları</h2>
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
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">İsim</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">E-Posta</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Telefon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tarih</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Durum</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($messages as $message)
                            <tr class="{{ !$message->is_read ? 'bg-blue-50' : '' }}">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $message->name }} {{ $message->surname }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $message->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $message->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $message->created_at->format('d.m.Y H:i') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full {{ $message->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $message->is_read ? 'Okundu' : 'Yeni' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('admin.contact-messages.show', $message) }}" class="text-blue-600 hover:text-blue-900 mr-3">Görüntüle</a>
                                    <form action="{{ route('admin.contact-messages.destroy', $message) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 delete-btn">Sil</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-4 text-center text-gray-500">Henüz mesaj yok.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>


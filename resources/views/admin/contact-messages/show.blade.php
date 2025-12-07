<x-admin-layout>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-900">Mesaj Detayı</h2>
                    <a href="{{ route('admin.contact-messages.index') }}" class="text-blue-600 hover:text-blue-900">← Geri Dön</a>
                </div>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">İsim</label>
                        <p class="text-gray-900 font-semibold">{{ $contactMessage->name }} {{ $contactMessage->surname }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">E-Posta</label>
                        <p class="text-gray-900">{{ $contactMessage->email }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Telefon</label>
                        <p class="text-gray-900">{{ $contactMessage->phone }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Mesaj</label>
                        <p class="text-gray-900 whitespace-pre-wrap">{{ $contactMessage->message }}</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tarih</label>
                        <p class="text-gray-900">{{ $contactMessage->created_at->format('d.m.Y H:i') }}</p>
                    </div>

                    <div class="pt-4 border-t">
                        <form action="{{ route('admin.contact-messages.destroy', $contactMessage) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 delete-btn">Mesajı Sil</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>


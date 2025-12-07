<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>İZOBİMS - Yönetici Paneli</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen">
        <!-- Navigation -->
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <!-- Logo -->
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                                <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-blue-800 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                                <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-blue-800 bg-clip-text text-transparent">
                                    İZOBİMS Admin
                                </span>
                            </a>
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                                {{ __('Dashboard') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.sliders.index')" :active="request()->routeIs('admin.sliders.*')">
                                {{ __('Slider') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.corporate-sections.index')" :active="request()->routeIs('admin.corporate-sections.*')">
                                {{ __('Kurumsal') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.faqs.index')" :active="request()->routeIs('admin.faqs.*')">
                                {{ __('SSS') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.contact-info.edit')" :active="request()->routeIs('admin.contact-info.*')">
                                {{ __('İletişim') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.contact-messages.index')" :active="request()->routeIs('admin.contact-messages.*')">
                                {{ __('Mesajlar') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                                {{ __('Kategoriler') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*') || request()->routeIs('admin.categories.*')">
                                {{ __('Ürünler') }}
                            </x-nav-link>
                        </div>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ms-6">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 focus:outline-none transition ease-in-out duration-150">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                {{ Auth::user()->name }}
                            </button>
                        </form>
                    </div>

                    <!-- Hamburger -->
                    <div class="-me-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('admin.sliders.index')" :active="request()->routeIs('admin.sliders.*')">
                            {{ __('Slider') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('admin.corporate-sections.index')" :active="request()->routeIs('admin.corporate-sections.*')">
                            {{ __('Kurumsal') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('admin.faqs.index')" :active="request()->routeIs('admin.faqs.*')">
                            {{ __('SSS') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('admin.contact-info.edit')" :active="request()->routeIs('admin.contact-info.*')">
                            {{ __('İletişim') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('admin.contact-messages.index')" :active="request()->routeIs('admin.contact-messages.*')">
                            {{ __('Mesajlar') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                            {{ __('Kategoriler') }}
                        </x-responsive-nav-link>
                        <x-responsive-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.*') || request()->routeIs('admin.categories.*')">
                            {{ __('Ürünler') }}
                        </x-responsive-nav-link>
                    </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md">
                                {{ __('Çıkış Yap') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @if(isset($header))
                <div class="py-4">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </div>
            @endif

            {{ $slot }}
        </main>
    </div>

    <script>
        // SweetAlert for delete confirmations
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const formId = this.dataset.deleteForm;
                    const form = formId ? document.getElementById(formId) : this.closest('form');
                    if (!form) {
                        return;
                    }
                    
                    Swal.fire({
                        title: 'Emin misiniz?',
                        text: "Bu işlem geri alınamaz!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Evet, Sil!',
                        cancelButtonText: 'İptal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>


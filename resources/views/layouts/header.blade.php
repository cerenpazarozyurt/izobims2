

<header id="main-header" class="fixed w-full top-0 z-50 bg-white/95 backdrop-blur-sm transition-all duration-300">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="{{ url('/') }}" class="flex items-center space-x-3 group">
                <img src="{{ asset('assets/images/logo.png') }}" alt="IZOBİMS Logo" style="width: 10rem;">
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-8">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors relative group">
                    Anasayfa
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ url('/kurumsal') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors relative group">
                    Kurumsal
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ url('/belgeler') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors relative group">
                    Belgeler
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ url('/urunler') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors relative group">
                    Ürünler
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ url('/sss') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors relative group">
                    S.S.S
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                </a>
                <a href="{{ url('/iletisim') }}" class="text-gray-700 hover:text-blue-600 font-medium transition-colors relative group">
                    İletişim
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-blue-600 group-hover:w-full transition-all duration-300"></span>
                </a>
            </nav>

            <!-- Search & Mobile Menu -->
            <div class="flex items-center space-x-4">
                <div class="hidden lg:block relative">
                    <input 
                        type="text" 
                        placeholder="Arama..." 
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                    />
                    <svg class="absolute left-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>

                <button onclick="toggleMobileMenu()" class="lg:hidden text-gray-700 hover:text-blue-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden lg:hidden pb-4">
            <nav class="flex flex-col space-y-3">
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-blue-600 font-medium py-2">Anasayfa</a>
                <a href="{{ url('/kurumsal') }}" class="text-gray-700 hover:text-blue-600 font-medium py-2">Kurumsal</a>
                <a href="{{ url('/belgeler') }}" class="text-gray-700 hover:text-blue-600 font-medium py-2">Belgeler</a>
                <a href="{{ url('/urunler') }}" class="text-gray-700 hover:text-blue-600 font-medium py-2">Ürünler</a>
                <a href="{{ url('/sss') }}" class="text-gray-700 hover:text-blue-600 font-medium py-2">S.S.S</a>
                <a href="{{ url('/iletisim') }}" class="text-gray-700 hover:text-blue-600 font-medium py-2">İletişim</a>
                <div class="relative pt-2">
                    <input 
                        type="text" 
                        placeholder="Arama..." 
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    />
                    <svg class="absolute left-3 top-4.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </nav>
        </div>
    </div>
</header>
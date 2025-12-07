<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IZOBİMS</title>
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="İZOBİMS - Yüksek kaliteli bims blokları, mükemmel ısı ve ses yalıtımı ile çevre dostu yapı malzemeleri. Depreme dayanıklı, ekonomik ve uzun ömürlü bims çözümleri.">
    <meta name="keywords" content="izobims, bims blok, bims blokları, ısı yalıtımı, ses yalıtımı, yapı malzemeleri, çevre dostu blok, depreme dayanıklı blok, hafif blok, yangına dayanıklı, inşaat malzemeleri, yalıtım malzemeleri">
    <meta name="author" content="İZOBİMS">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Turkish">
    <meta name="revisit-after" content="7 days">
    <meta name="theme-color" content="#059669">
    
    <!-- Open Graph Meta Tags (Facebook, LinkedIn) -->
    <meta property="og:title" content="İZOBİMS - Kaliteli Bims Blokları ve Yalıtım Çözümleri">
    <meta property="og:description" content="Yüksek yalıtım performansı ve dayanıklılığı bir araya getiren yenilikçi yapı malzemeleri. Hafif yapısı, mükemmel ısı ve ses yalıtımı özellikleri.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('assets/slider/slider1.png') }}">
    <meta property="og:site_name" content="İZOBİMS">
    <meta property="og:locale" content="tr_TR">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="İZOBİMS - Kaliteli Bims Blokları">
    <meta name="twitter:description" content="Yüksek kaliteli bims blokları, mükemmel ısı ve ses yalıtımı ile çevre dostu yapı malzemeleri.">
    <meta name="twitter:image" content="{{ asset('assets/slider/slider1.png') }}">
    
    <!-- Additional Meta Tags -->
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="mobile-web-app-capable" content="yes">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes blob {
            0%, 100% {
                transform: translate(0px, 0px) scale(1);
            }
            33% {
                transform: translate(30px, -50px) scale(1.1);
            }
            66% {
                transform: translate(-20px, 20px) scale(0.9);
            }
        }
        .float-animation {
            animation: float 6s ease-in-out infinite;
        }
        .fade-in-up {
            animation: fadeInUp 0.8s ease-out forwards;
        }
        .card-3d {
            transform: perspective(1000px);
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
        }
        .card-3d:hover {
            transform: perspective(1000px) rotateY(5deg) rotateX(5deg) scale(1.05);
        }
        .animate-blob {
            animation: blob 7s infinite;
        }
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        .animation-delay-4000 {
            animation-delay: 4s;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">
    @include('layouts.header')

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    @include('layouts.footer')

    <script>
        // Scroll animasyonları
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        }

        // Header scroll effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('main-header');
            if (window.scrollY > 50) {
                header.classList.add('shadow-lg', 'bg-white');
                header.classList.remove('bg-white/95');
            } else {
                header.classList.remove('shadow-lg', 'bg-white');
                header.classList.add('bg-white/95');
            }
        });
    </script>
</body>
</html>
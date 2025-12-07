@extends('layouts.app')

<style>
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-60px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(60px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes scaleIn {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    @keyframes blob {

        0%,
        100% {
            transform: translate(0px, 0px) scale(1);
        }

        33% {
            transform: translate(30px, -50px) scale(1.1);
        }

        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
    }

    .animate-fadeInUp {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .animate-slideInLeft {
        animation: slideInLeft 0.8s ease-out forwards;
    }

    .animate-slideInRight {
        animation: slideInRight 0.8s ease-out forwards;
    }

    .animate-scaleIn {
        animation: scaleIn 0.6s ease-out forwards;
    }

    .animate-float {
        animation: float 6s ease-in-out infinite;
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animate-on-scroll {
        opacity: 0;
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .slide-in-left {
        animation: slideInLeft 0.8s ease-out forwards;
    }

    .slide-in-right {
        animation: slideInRight 0.8s ease-out forwards;
    }

    .scale-in {
        animation: scaleIn 0.6s ease-out forwards;
    }

    .delay-100 {
        animation-delay: 0.1s;
    }

    .delay-200 {
        animation-delay: 0.2s;
    }

    .delay-300 {
        animation-delay: 0.3s;
    }

    .delay-400 {
        animation-delay: 0.4s;
    }

    .delay-500 {
        animation-delay: 0.5s;
    }

    .delay-600 {
        animation-delay: 0.6s;
    }

    /* Parallax effect */
    .parallax-section {
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    /* Timeline */
    .timeline-item::before {
        content: '';
        position: absolute;
        left: -8px;
        top: 0;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        background: #10b981;
        border: 3px solid white;
        box-shadow: 0 0 0 3px #10b981;
    }

    /* Adjusted Timeline Item */
    .timeline-item {
        padding-left: 24px;
        /* Added padding to prevent text overlap with dot */
    }

    /* Gradient text */
    .gradient-text {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Card hover effect */
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    /* Image hover effect */
    .image-hover-zoom {
        overflow: hidden;
        border-radius: 1.5rem;
    }

    .image-hover-zoom img {
        transition: transform 0.5s ease;
    }

    .image-hover-zoom:hover img {
        transform: scale(1.1);
    }

    .hover-lift:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }
</style>

@section('content')
    @php
        $vision = $sections->where('type', 'vision')->first();
        $mission = $sections->where('type', 'mission')->first();
        $about = $sections->where('type', 'about')->first();
        $healthyLife = $sections->where('type', 'healthy_life')->first();
        $whyIzobims = $sections->where('type', 'why_izobims')->first();
    @endphp
    <!-- Hero Section -->
    <section class="relative h-[65vh] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('assets/slider/kurumsal1.jpg') }}" alt="Background" class="w-full h-full object-cover">
            <!-- Dark Overlay for readability -->
            <div class="absolute inset-0 bg-gradient-to-br from-gray-900/90 via-gray-800/85 to-green-900/90"></div>
        </div>

        <!-- Animated Background Blobs -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-20 w-72 h-72 bg-green-500 rounded-full filter blur-3xl animate-blob"></div>
            <div
                class="absolute bottom-20 right-20 w-72 h-72 bg-blue-500 rounded-full filter blur-3xl animate-blob delay-200">
            </div>
        </div>

        <!-- Content -->
        <div class="relative h-full flex items-center justify-center pt-16">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <div class="animate-fadeInUp">
                    <span
                        class="inline-block mb-4 text-green-400 font-semibold text-sm uppercase tracking-wider bg-green-900/30 px-4 py-2 rounded-full border border-green-500/30">
                        Kurumsal
                    </span>
                </div>
                <h1 class="text-5xl lg:text-7xl font-bold text-white mb-6 animate-fadeInUp delay-100">
                    Doğaya Atılan
                    <span class="block mt-2 text-green-400">İmza</span>
                </h1>
                <p class="text-xl lg:text-2xl text-gray-300 max-w-4xl mx-auto leading-relaxed animate-fadeInUp delay-200">
                    Bimsten üretilen yapı elemanları ile kalıcı, sürdürülebilir ve sağlıklı mekanlar yaratıyoruz
                </p>
            </div>
        </div>
    </section>

    <!-- Doğal Yapı Malzemeleri Section -->
    <section class="py-20 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left: Image/Visual -->
                <div class="animate-on-scroll relative">
                    <div class="relative image-hover-zoom shadow-2xl">
                        <img src="{{ $healthyLife && $healthyLife->image ? asset('storage/' . $healthyLife->image) : asset('assets/kurumsal/bimsblok.jpeg') }}"
                            alt="Doğal Yapı Malzemeleri" class="w-full h-[500px] object-cover rounded-3xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-green-900/50 to-transparent rounded-3xl"></div>
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="animate-on-scroll">
                    @if ($healthyLife)
                        @if ($healthyLife->highlighted_text)
                            <div class="inline-block mb-4">
                                <span
                                    class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-green-100 px-4 py-2 rounded-full">
                                    {{ $healthyLife->highlighted_text }}
                                </span>
                            </div>
                        @else
                            <div class="inline-block mb-4">
                                <span
                                    class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-green-100 px-4 py-2 rounded-full">
                                    Sağlıklı Yaşam
                                </span>
                            </div>
                        @endif
                        @if ($healthyLife->title)
                            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                                {!! $healthyLife->title !!}
                            </h2>
                        @else
                            <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                                Doğal ve
                                <span class="gradient-text">Sağlıklı Mekanlar</span>
                            </h2>
                        @endif
                        @if ($healthyLife->content)
                            <div class="space-y-4 text-lg text-gray-700 leading-relaxed">
                                {!! nl2br(e($healthyLife->content)) !!}
                            </div>
                        @else
                            <div class="space-y-4 text-lg text-gray-700 leading-relaxed">
                                <p>
                                    Doğal olmayan yapı malzemelerinde kullanılan kimyevi maddelerin, yer altı
                                    manyetizmasının
                                    yayımladığı elektromanyetik dalgaların, güneş ve diğer kaynaklardan gelen ultraviyole ve
                                    radyasyonik zararlı ışınımların insan sağlığını olumsuz etkilemesini ve bazı
                                    hastalıklara yol
                                    açmasını engellemenin bir yolu da yaşadığımız mekanların inşasında bims (pomza)
                                    kullanmaktır.
                                </p>
                                <p class="font-semibold text-green-600">
                                    İşte bu yüzdendir ki İzobims bimsblokları yaşanabilecek doğal ve sağlıklı mekanlar
                                    oluşturur.
                                </p>
                            </div>
                        @endif
                    @else
                        <div class="inline-block mb-4">
                            <span
                                class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-green-100 px-4 py-2 rounded-full">
                                Sağlıklı Yaşam
                            </span>
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                            Doğal ve
                            <span class="gradient-text">Sağlıklı Mekanlar</span>
                        </h2>
                        <div class="space-y-4 text-lg text-gray-700 leading-relaxed">
                            <p>
                                Doğal olmayan yapı malzemelerinde kullanılan kimyevi maddelerin, yer altı manyetizmasının
                                yayımladığı elektromanyetik dalgaların, güneş ve diğer kaynaklardan gelen ultraviyole ve
                                radyasyonik zararlı ışınımların insan sağlığını olumsuz etkilemesini ve bazı hastalıklara
                                yol
                                açmasını engellemenin bir yolu da yaşadığımız mekanların inşasında bims (pomza)
                                kullanmaktır.
                            </p>
                            <p class="font-semibold text-green-600">
                                İşte bu yüzdendir ki İzobims bimsblokları yaşanabilecek doğal ve sağlıklı mekanlar
                                oluşturur.
                            </p>
                        </div>
                    @endif

                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-4 mt-8">
                        <div class="text-center p-4 bg-green-50 rounded-xl">
                            <div class="text-3xl font-bold text-green-600 mb-1">100%</div>
                            <div class="text-sm text-gray-600">Doğal</div>
                        </div>
                        <div class="text-center p-4 bg-blue-50 rounded-xl">
                            <div class="text-3xl font-bold text-blue-600 mb-1">0</div>
                            <div class="text-sm text-gray-600">Kimyasal</div>
                        </div>
                        <div class="text-center p-4 bg-purple-50 rounded-xl">
                            <div class="text-3xl font-bold text-purple-600 mb-1">A+</div>
                            <div class="text-sm text-gray-600">Sınıf</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hakkımızda Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-green-50 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-green-500 rounded-full filter blur-3xl animate-blob"></div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl animate-blob delay-300">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left: Content -->
                <div class="animate-on-scroll lg:order-1 order-2">
                    <div class="inline-block mb-4">
                        <span
                            class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-white px-4 py-2 rounded-full shadow-lg">
                            Hakkımızda
                        </span>
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                        İzolasyonlu
                        <span class="gradient-text">Hafif Yapı Elemanları</span>
                    </h2>
                    <div class="space-y-4 text-lg text-gray-700 leading-relaxed">
                        <p>
                            İnşaat sektöründe söz sahibi firmalar arasına yer alan YAPISAN LTD. ŞTİ.'nin tecrübeli ve güçlü
                            kadrosuyla bu topraklara hizmet vermek için kurulan <span
                                class="font-semibold text-green-600">İZOBİMS® LTD. ŞTİ.</span>, bu topraktan aldığı
                            madenleri işleyerek ülkesinin bims ihtiyacını karşılamak üzere tükenmez bir gayret
                            göstermektedir.
                        </p>
                        <p>
                            İZOBİMS® markasının sektörde önemli bir yer bulduğu bu sahada, günümüz teknolojilerine uygun
                            makinaları ve deneyimli personelleri bünyesine katarak üretimini artırmış ve etkinliklerine hız
                            vermiştir.
                        </p>
                    </div>

                    <!-- Features -->
                    <div class="mt-8 grid grid-cols-2 gap-4">
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Modern Teknoloji</h4>
                                <p class="text-sm text-gray-600">Son teknoloji üretim</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Deneyimli Kadro</h4>
                                <p class="text-sm text-gray-600">Uzman personel</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Yerli Üretim</h4>
                                <p class="text-sm text-gray-600">Anadolu topraklarından</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">Kalite Güvencesi</h4>
                                <p class="text-sm text-gray-600">Sertifikalı üretim</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Timeline -->
                <div class="animate-on-scroll lg:order-2 order-1">
                    <div class="bg-white rounded-3xl shadow-2xl p-8 lg:p-12">
                        <h3 class="text-2xl font-bold text-gray-900 mb-8">Gelişim Sürecimiz</h3>
                        <div class="relative border-l-2 border-green-500 pl-8 space-y-8">
                            <div class="timeline-item relative animate-on-scroll">
                                <div class="mb-1 text-sm font-semibold text-green-600">Kuruluş</div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">İlk Adım</h4>
                                <p class="text-gray-600">YAPISAN LTD. ŞTİ.'nin tecrübesiyle İZOBİMS® kuruldu</p>
                            </div>
                            <div class="timeline-item relative animate-on-scroll delay-100">
                                <div class="mb-1 text-sm font-semibold text-green-600">Büyüme</div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">Teknoloji Yatırımı</h4>
                                <p class="text-gray-600">Modern makineler ve deneyimli personel ile kapasite artışı</p>
                            </div>
                            <div class="timeline-item relative animate-on-scroll delay-200">
                                <div class="mb-1 text-sm font-semibold text-green-600">Bugün</div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">Sektör Lideri</h4>
                                <p class="text-gray-600">Türkiye'nin önde gelen bims üreticilerinden biri</p>
                            </div>
                            <div class="timeline-item relative animate-on-scroll delay-300">
                                <div class="mb-1 text-sm font-semibold text-green-600">Gelecek</div>
                                <h4 class="text-xl font-bold text-gray-900 mb-2">Sürdürülebilir Büyüme</h4>
                                <p class="text-gray-600">İnovasyon ve kalite odaklı gelişim</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vizyonumuz & Misyonumuz Section -->
    <section class="py-20 bg-gradient-to-br from-gray-900 via-gray-800 to-green-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-96 h-96 bg-green-500 rounded-full filter blur-3xl animate-blob"></div>
            <div
                class="absolute bottom-0 left-0 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl animate-blob delay-400">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Vizyonumuz -->
                <div class="animate-on-scroll">
                    <div
                        class="bg-white/10 backdrop-blur-lg rounded-3xl p-10 border border-white/20 shadow-2xl hover-lift h-full">
                        <div
                            class="w-20 h-20 bg-green-500/20 rounded-2xl flex items-center justify-center mb-6 border border-green-500/30">
                            <svg class="w-10 h-10 text-green-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                </path>
                            </svg>
                        </div>
                        <h3 class="text-3xl font-bold text-white mb-6">{{ $vision->title ?? 'Vizyonumuz' }}</h3>
                        @if ($vision)
                            @if ($vision->content)
                                <p class="text-gray-300 text-lg leading-relaxed mb-6">
                                    {!! nl2br(e($vision->content)) !!}
                                </p>
                            @endif
                            @if ($vision->highlighted_text)
                                <div class="flex items-center text-green-400 font-semibold">
                                    <span>{{ $vision->highlighted_text }}</span>
                                @else
                                    <div class="flex items-center text-green-400 font-semibold">
                                        <span>Geleceği İnşa Ediyoruz</span>
                            @endif
                        @else
                            <p class="text-gray-300 text-lg leading-relaxed mb-6">
                                Türkiye'nin ve bölgenin en güvenilir, yenilikçi ve sürdürülebilir bims üreticisi olmak.
                                Sektörde
                                öncü bir marka olarak, çevre dostu ve sağlıklı yaşam alanları yaratmak için teknoloji ve
                                kaliteyi bir araya getiren çözümler sunmak.
                            </p>
                            <div class="flex items-center text-green-400 font-semibold">
                                <span>Geleceği İnşa Ediyoruz</span>
                        @endif
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Misyonumuz -->
            <div class="animate-on-scroll delay-200">
                <div
                    class="bg-white/10 backdrop-blur-lg rounded-3xl p-10 border border-white/20 shadow-2xl hover-lift h-full">
                    <div
                        class="w-20 h-20 bg-blue-500/20 rounded-2xl flex items-center justify-center mb-6 border border-blue-500/30">
                        <svg class="w-10 h-10 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-6">{{ $mission->title ?? 'Misyonumuz' }}</h3>
                    @if ($mission)
                        @if ($mission->content)
                            <p class="text-gray-300 text-lg leading-relaxed mb-6">
                                {!! nl2br(e($mission->content)) !!}
                            </p>
                        @endif
                        @if ($mission->highlighted_text)
                            <div class="flex items-center text-blue-400 font-semibold">
                                <span>{{ $mission->highlighted_text }}</span>
                            @else
                                <div class="flex items-center text-blue-400 font-semibold">
                                    <span>Kalite İle Hizmet Ediyoruz</span>
                        @endif
                    @else
                        <p class="text-gray-300 text-lg leading-relaxed mb-6">
                            Doğal hammaddelerden ürettiğimiz yüksek kaliteli bims blokları ile insan sağlığına ve çevreye
                            duyarlı, enerji verimli yapılar inşa etmek. Modern teknoloji, deneyimli ekibimiz ve müşteri
                            memnuniyeti odaklı yaklaşımımızla sektöre değer katmak.
                        </p>
                        <div class="flex items-center text-blue-400 font-semibold">
                            <span>Kalite İle Hizmet Ediyoruz</span>
                    @endif
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>

    <!-- Neden Biz Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center mb-16 animate-on-scroll">
                <div class="inline-block mb-4">
                    <span
                        class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-green-100 px-4 py-2 rounded-full">
                        Avantajlarımız
                    </span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Neden
                    <span class="gradient-text">İzobims?</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Sol: Fabrika Resmi -->
                <div class="animate-on-scroll">
                    <div class="relative image-hover-zoom shadow-2xl">
                        <img src="{{ $whyIzobims && $whyIzobims->image ? asset('storage/' . $whyIzobims->image) : asset('assets/kurumsal/fabrika.jpg') }}"
                            alt="İzobims Üretim Tesisi" class="w-full h-[600px] object-cover rounded-3xl">
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/70 to-transparent rounded-3xl"></div>
                        <div class="absolute bottom-8 left-8 right-8">
                            <div class="text-white">
                                <h3 class="text-3xl font-bold mb-3">
                                    {{ $whyIzobims && $whyIzobims->title ? $whyIzobims->title : 'Modern Üretim Tesisimiz' }}
                                </h3>
                                <p class="text-lg text-gray-200">
                                    {{ $whyIzobims && $whyIzobims->content ? $whyIzobims->content : 'Son teknoloji ile donatılmış fabrikamızda günlük yüksek kapasitede üretim yapıyoruz' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Avantajlar Listesi -->
                <div class="animate-on-scroll space-y-6">
                    <!-- Advantage 1 -->
                    <div
                        class="flex items-start space-x-4 p-6 bg-gradient-to-r from-green-50 to-transparent rounded-2xl border-l-4 border-green-500 hover-lift">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Yerli ve Milli Üretim</h3>
                            <p class="text-gray-600">Anadolu topraklarından çıkan doğal bims ile yerli üretim yapıyor,
                                ekonomiye katkı sağlıyoruz.</p>
                        </div>
                    </div>

                    <!-- Advantage 2 -->
                    <div
                        class="flex items-start space-x-4 p-6 bg-gradient-to-r from-blue-50 to-transparent rounded-2xl border-l-4 border-blue-500 hover-lift">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Modern Üretim Tesisi</h3>
                            <p class="text-gray-600">Son teknoloji makineler ve otomatik üretim hatları ile yüksek kapasite
                                ve kalite sağlıyoruz.</p>
                        </div>
                    </div>

                    <!-- Advantage 3 -->
                    <div
                        class="flex items-start space-x-4 p-6 bg-gradient-to-r from-purple-50 to-transparent rounded-2xl border-l-4 border-purple-500 hover-lift">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Deneyimli Ekip</h3>
                            <p class="text-gray-600">Sektörde yıllarca tecrübe kazanmış uzman personelimiz ile kaliteli
                                hizmet sunuyoruz.</p>
                        </div>
                    </div>

                    <!-- Advantage 5 -->
                    <div
                        class="flex items-start space-x-4 p-6 bg-gradient-to-r from-teal-50 to-transparent rounded-2xl border-l-4 border-teal-500 hover-lift">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-teal-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Kalite Sertifikaları</h3>
                            <p class="text-gray-600">Tüm üretimimiz ulusal ve uluslararası kalite standartlarına uygun
                                olarak gerçekleştiriliyor.</p>
                        </div>
                    </div>

                    <!-- Advantage 6 -->
                    <div
                        class="flex items-start space-x-4 p-6 bg-gradient-to-r from-pink-50 to-transparent rounded-2xl border-l-4 border-pink-500 hover-lift">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-pink-100 rounded-lg flex items-center justify-center">
                                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Teknik Destek</h3>
                            <p class="text-gray-600">Satış sonrası teknik destek ve danışmanlık hizmetleri ile
                                yanınızdayız.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Scroll Animation Script -->
    <script>
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('animate-on-scroll')) {
                        // Determine which animation to use based on position
                        const rect = entry.target.getBoundingClientRect();
                        const isLeft = rect.left < window.innerWidth / 2;

                        if (entry.target.closest('.lg\\:order-1, .lg\\:order-2')) {
                            // For sections with specific order
                            if (entry.target.classList.contains('lg:order-1') || isLeft) {
                                entry.target.classList.add('slide-in-left');
                            } else {
                                entry.target.classList.add('slide-in-right');
                            }
                        } else {
                            // Default fade in up
                            entry.target.classList.add('fade-in-up');
                        }
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Observe all elements with animate-on-scroll class
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
@endsection

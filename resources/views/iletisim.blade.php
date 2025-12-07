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

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            opacity: 1;
        }

        50% {
            transform: scale(1.05);
            opacity: 0.8;
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

    .animate-pulse-slow {
        animation: pulse 3s ease-in-out infinite;
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

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    .input-field:focus {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(16, 185, 129, 0.15);
    }

    .map-container {
        height: 450px;
        border-radius: 1.5rem;
        overflow: hidden;
    }

    .contact-icon {
        position: relative;
    }

    .contact-icon::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: inherit;
        opacity: 0;
        animation: pulse-ring 2s ease-out infinite;
    }

    @keyframes pulse-ring {
        0% {
            transform: translate(-50%, -50%) scale(1);
            opacity: 0.5;
        }

        100% {
            transform: translate(-50%, -50%) scale(1.5);
            opacity: 0;
        }
    }

    .submit-btn {
        position: relative;
        overflow: hidden;
    }

    .submit-btn::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.3);
        transform: translate(-50%, -50%);
        transition: width 0.6s, height 0.6s;
    }

    .submit-btn:active::after {
        width: 300px;
        height: 300px;
    }
</style>
@section('content')
    <!-- Hero Section -->
    <section class="relative h-[65vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('assets/slider/iletisim.jpg') }}" alt="Background" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-br from-gray-900/90 via-gray-800/85 to-green-900/90"></div>
        </div>

        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-20 w-72 h-72 bg-green-500 rounded-full filter blur-3xl animate-blob"></div>
            <div
                class="absolute bottom-20 right-20 w-72 h-72 bg-blue-500 rounded-full filter blur-3xl animate-blob delay-200">
            </div>
        </div>

        <div class="relative h-full flex items-center justify-center z-10 pt-20 md:pt-24">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <div class="animate-fadeInUp">
                    <span
                        class="inline-block mb-4 text-green-400 font-semibold text-sm uppercase tracking-wider bg-green-900/30 px-4 py-2 rounded-full border border-green-500/30 backdrop-blur-sm">
                        İletişim
                    </span>
                </div>
                <h1
                    class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 animate-fadeInUp delay-100 drop-shadow-2xl">
                    Bize
                    <span class="text-green-400">Ulaşın</span>
                </h1>
                <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto animate-fadeInUp delay-200 drop-shadow-lg">
                    Sorularınız için buradayız. Size yardımcı olmaktan mutluluk duyarız.
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Info Cards -->
    <section class="py-12 -mt-20 relative z-10">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Phone Card -->
                <div class="animate-on-scroll bg-white rounded-2xl p-8 shadow-xl hover-lift">
                    <div
                        class="contact-icon w-16 h-16 bg-green-100 rounded-xl flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Telefon</h3>
                    <p class="text-gray-600 text-center mb-4">Bizi arayın</p>
                    <a href="tel:{{ $contactInfo->phone ?? '+90 (384) 219 3 219' }}"
                        class="block text-center text-green-600 font-semibold hover:text-green-700 transition-colors">
                        {{ $contactInfo->phone ?? '+90 (384) 219 3 219' }}
                    </a>
                </div>

                <!-- Email Card -->
                <div class="animate-on-scroll delay-100 bg-white rounded-2xl p-8 shadow-xl hover-lift">
                    <div
                        class="contact-icon w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-2">E-Posta</h3>
                    <p class="text-gray-600 text-center mb-4">Bize yazın</p>
                    <a href="mailto:{{ $contactInfo->email ?? 'izobims@izobims.com' }}"
                        class="block text-center text-blue-600 font-semibold hover:text-blue-700 transition-colors">
                        {{ $contactInfo->email ?? 'izobims@izobims.com' }}
                    </a>
                </div>

                <!-- Address Card -->
                <div class="animate-on-scroll delay-200 bg-white rounded-2xl p-8 shadow-xl hover-lift">
                    <div
                        class="contact-icon w-16 h-16 bg-purple-100 rounded-xl flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                            </path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 text-center mb-2">Adres</h3>
                    <p class="text-gray-600 text-center mb-4">Bizi ziyaret edin</p>
                    <p class="text-purple-600 font-semibold text-center leading-relaxed">
                        {!! nl2br(
                            e($contactInfo->address ?? 'Uçhisar Kasabası Yukarı Mah. <br> Harflı Mevkii (Ürgüp Yolu 4.Km) <br> NEVŞEHİR'),
                        ) !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Contact Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            @if (session('success'))
                <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Left: Contact Form -->
                <div class="animate-on-scroll">
                    <div class="bg-gradient-to-br from-green-50 to-blue-50 rounded-3xl p-8 lg:p-10 shadow-xl">
                        <div class="mb-8">
                            <div class="inline-block mb-4">
                                <span
                                    class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-white px-4 py-2 rounded-full shadow-lg">
                                    İletişim Formu
                                </span>
                            </div>
                            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                                Bize
                                <span class="gradient-text">Yazın</span>
                            </h2>
                            <p class="text-gray-600 text-lg">
                                Formu doldurun, en kısa sürede size geri dönelim
                            </p>
                        </div>

                        <form class="space-y-6" id="contactForm" action="{{ route('contact.store') }}" method="POST">
                            @csrf
                            <!-- Name & Surname -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                        İsim *
                                    </label>
                                    <input type="text" id="name" name="name" required
                                        class="input-field w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-all duration-300"
                                        placeholder="İsminiz">
                                </div>
                                <div>
                                    <label for="surname" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Soyisim *
                                    </label>
                                    <input type="text" id="surname" name="surname" required
                                        class="input-field w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-all duration-300"
                                        placeholder="Soyisminiz">
                                </div>
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    E-Posta *
                                </label>
                                <input type="email" id="email" name="email" required
                                    class="input-field w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-all duration-300"
                                    placeholder="ornek@email.com">
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Telefon *
                                </label>
                                <input type="tel" id="phone" name="phone" required
                                    class="input-field w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-all duration-300"
                                    placeholder="+90 (___) ___ __ __">
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Mesajınız *
                                </label>
                                <textarea id="message" name="message" required rows="5"
                                    class="input-field w-full px-4 py-3 bg-white border-2 border-gray-200 rounded-xl focus:border-green-500 focus:outline-none transition-all duration-300 resize-none"
                                    placeholder="Mesajınızı buraya yazın..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="submit-btn w-full px-8 py-4 bg-gradient-to-r from-green-500 to-green-600 text-white rounded-xl font-bold text-lg shadow-xl hover:shadow-2xl hover:from-green-600 hover:to-green-700 transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center group">
                                <span>Gönder</span>
                                <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </button>

                            <p class="text-sm text-gray-500 text-center">
                                * İşaretli alanlar zorunludur
                            </p>
                        </form>
                    </div>
                </div>

                <!-- Right: Map & Info -->
                <div class="animate-on-scroll space-y-8">
                    <!-- Map -->
                    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                        <div class="p-6 border-b border-gray-100">
                            <h3 class="text-2xl font-bold text-gray-900 flex items-center">
                                <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Konumumuz
                            </h3>
                        </div>
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2825.5369869213505!2d34.7701406459823!3d38.616103777654246!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x152a6ecd731bdcb1%3A0xde2866577ab68128!2zxLB6b2JpbXM!5e0!3m2!1str!2str!4v1761490386272!5m2!1str!2str"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                    <!-- Working Hours -->
                    <div class="bg-gradient-to-br from-gray-900 to-green-900 rounded-3xl p-8 shadow-xl">
                        <h3 class="text-2xl font-bold text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 text-green-400 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Çalışma Saatleri
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-gray-300">
                                <span class="font-semibold">Pazartesi - Salı:</span>
                                <span class="text-green-400">09:00 - 18:00</span>
                            </div>
                            <div class="flex justify-between items-center text-gray-300">
                                <span class="font-semibold">Çarşamba - Perşembe - Cuma - Cumartesi:</span>
                                <span class="text-green-400">09:00 - 18:30</span>
                            </div>
                            <div class="flex justify-between items-center text-gray-300">
                                <span class="font-semibold">Pazar:</span>
                                <span class="text-red-400">Kapalı</span>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-700">
                            <p class="text-gray-300 text-sm leading-relaxed">
                                <svg class="w-5 h-5 text-green-400 inline mr-2" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Acil durumlar için 7/24 destek hattımız aktiftir.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in-up');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                observer.observe(el);
            });

            // FAQ Accordion
            const faqButtons = document.querySelectorAll('.faq-button');
            faqButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('svg');

                    // Close all other FAQs
                    faqButtons.forEach(otherButton => {
                        if (otherButton !== button) {
                            const otherContent = otherButton.nextElementSibling;
                            const otherIcon = otherButton.querySelector('svg');
                            otherContent.classList.add('hidden');
                            otherIcon.classList.remove('rotate-180');
                        }
                    });

                    // Toggle current FAQ
                    content.classList.toggle('hidden');
                    icon.classList.toggle('rotate-180');
                });
            });

            // Phone number formatting
            const phoneInput = document.getElementById('phone');
            phoneInput.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, '');
                if (value.length > 0) {
                    if (value.length <= 10) {
                        value = value.replace(/(\d{3})(\d{3})(\d{2})(\d{2})/, '+90 ($1) $2 $3 $4');
                    }
                    e.target.value = value;
                }
            });
        });

        // Smooth scroll
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

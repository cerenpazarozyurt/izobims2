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

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animate-on-scroll {
        opacity: 0;
    }

    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
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

    .delay-700 {
        animation-delay: 0.7s;
    }

    .delay-800 {
        animation-delay: 0.8s;
    }

    .delay-900 {
        animation-delay: 0.9s;
    }

    .gradient-text {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    /* FAQ Accordion */
    .faq-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s ease, opacity 0.4s ease, padding 0.4s ease;
        opacity: 0;
    }

    .faq-content.active {
        max-height: 500px;
        opacity: 1;
        padding-top: 1rem;
        padding-bottom: 1.25rem;
    }

    .faq-button svg {
        transition: transform 0.3s ease;
    }

    .faq-button.active svg {
        transform: rotate(180deg);
    }

    .number-badge {
        transition: all 0.3s ease;
    }

    .faq-item:hover .number-badge {
        transform: scale(1.1);
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }
</style>
@section('content')
    <!-- Hero Section -->
    <section class="relative h-[65vh] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('assets/slider/sss.jpg') }}" alt="Background" class="w-full h-full object-cover">
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
        <div class="relative h-full flex items-center justify-center">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <div class="animate-fadeInUp">
                    <span
                        class="inline-block mb-4 text-green-400 font-semibold text-sm uppercase tracking-wider bg-green-900/30 px-4 py-2 rounded-full border border-green-500/30">
                        Yardım Merkezi
                    </span>
                </div>
                <h1 class="text-5xl lg:text-6xl font-bold text-white mb-6 animate-fadeInUp delay-100">
                    Sıkça Sorulan
                    <span class="text-green-400">Sorular</span>
                </h1>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto animate-fadeInUp delay-200">
                    Merak ettiğiniz her şey burada. Sorularınızın cevaplarını hemen bulun.
                </p>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4">
            <div class="space-y-4" id="faqContainer">
                @forelse($faqs as $index => $faq)
                    <!-- FAQ Item {{ $index + 1 }} -->
                    <div
                        class="faq-item animate-on-scroll {{ $index > 0 ? 'delay-' . $index * 100 : '' }} bg-gradient-to-br from-white to-green-50 rounded-2xl shadow-lg overflow-hidden hover-lift">
                        <button class="faq-button w-full px-6 py-6 text-left flex items-start gap-4">
                            <div
                                class="number-badge flex-shrink-0 w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center font-bold text-green-600">
                                {{ $index + 1 }}
                            </div>
                            <div class="flex-1">
                                <h3 class="font-bold text-gray-900 text-lg mb-1">{{ $faq->question }}</h3>
                            </div>
                            <svg class="flex-shrink-0 w-6 h-6 text-green-600" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                                </path>
                            </svg>
                        </button>
                        <div class="faq-content px-6">
                            <div class="pl-14 pr-10">
                                <p class="text-gray-600 leading-relaxed mb-4">
                                    {!! nl2br(e($faq->answer)) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12">
                        <p class="text-gray-500">Henüz soru eklenmemiş.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
    <!-- Contact CTA -->
    <div class="mt-16 animate-on-scroll">
        <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-2xl p-8 text-center shadow-2xl">
            <h3 class="text-3xl font-bold text-white mb-4">Sorunuzun cevabını bulamadınız mı?</h3>
            <p class="text-green-100 mb-6 text-lg">Uzman ekibimiz size yardımcı olmak için hazır</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="/iletisim"
                    class="bg-white text-green-600 px-8 py-4 rounded-xl font-bold hover:bg-gray-50 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                        </path>
                    </svg>
                    İletişime Geçin
                </a>
                <a href="tel:+905XXXXXXXXX"
                    class="bg-green-700 text-white px-8 py-4 rounded-xl font-bold hover:bg-green-800 transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                    <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                        </path>
                    </svg>
                    Bizi Arayın
                </a>
            </div>
        </div>
    </div>
    </div>
    </section>

    <script>
        // FAQ Accordion
        document.querySelectorAll('.faq-button').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                const isActive = content.classList.contains('active');

                // Close all other items
                document.querySelectorAll('.faq-content').forEach(item => {
                    item.classList.remove('active');
                });
                document.querySelectorAll('.faq-button').forEach(btn => {
                    btn.classList.remove('active');
                });

                // Toggle current item
                if (!isActive) {
                    content.classList.add('active');
                    button.classList.add('active');
                }
            });
        });

        // Scroll animations
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
        });
    </script>
@endsection

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

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(100%);
        }

        to {
            opacity: 1;
            transform: translateY(0);
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

    /* Certificate Card Hover */
    .certificate-card {
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: pointer;
    }

    .certificate-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
    }

    .certificate-card:hover .certificate-image img {
        transform: scale(1.05);
    }

    .certificate-card:hover .certificate-badge {
        opacity: 1;
        transform: translateY(0);
    }

    .certificate-image img {
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .certificate-badge {
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease;
    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        animation: fadeIn 0.3s ease;
        overflow: auto;
    }

    .modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
    }

    .modal-content {
        position: relative;
        max-width: 80vw;
        /* Reduced from 90% to better fit screen */
        max-height: 80vh;
        /* Reduced from 90% to prevent overflow */
        width: auto;
        height: auto;
        animation: slideInUp 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal-content img {
        max-width: 100%;
        max-height: 80vh;
        /* Match modal-content height */
        width: auto;
        height: auto;
        object-fit: contain;
        /* Ensure image scales proportionally */
        border-radius: 1rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
    }

    .modal-close {
        position: absolute;
        top: -50px;
        right: 0;
        background: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .modal-close:hover {
        transform: rotate(90deg);
        background: #ef4444;
    }

    .modal-close:hover svg {
        color: white;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    /* Gradient text */
    .gradient-text {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
</style>

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[65vh] overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="{{ asset('assets/slider/belge.jpg') }}" alt="Background" class="w-full h-full object-cover">
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
                        Belgelerimiz
                    </span>
                </div>
                <h1 class="text-5xl lg:text-7xl font-bold text-white mb-6 animate-fadeInUp delay-100">
                    Kalite ve
                    <span class="block mt-2 text-green-400">Güvenilirlik</span>
                </h1>
                <p class="text-xl lg:text-2xl text-gray-300 max-w-3xl mx-auto leading-relaxed animate-fadeInUp delay-200">
                    Tüm üretim süreçlerimiz ulusal ve uluslararası standartlara uygun olarak belgelendirilmiştir
                </p>
            </div>
        </div>
    </section>

    <!-- Certificates Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-green-50 relative overflow-hidden">
        <!-- Background Decoration -->
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-green-500 rounded-full filter blur-3xl animate-blob"></div>
            <div
                class="absolute bottom-0 right-0 w-96 h-96 bg-blue-500 rounded-full filter blur-3xl animate-blob delay-300">
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16 animate-on-scroll">
                <div class="inline-block mb-4">
                    <span
                        class="text-green-600 font-semibold text-sm uppercase tracking-wider bg-white px-4 py-2 rounded-full shadow-lg">
                        Sertifikalar & Belgeler
                    </span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Kalite
                    <span class="gradient-text">Güvencemiz</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Tüm belgelerimizi görüntülemek için belge üzerine tıklayın
                </p>
            </div>

            <!-- Certificates Grid -->
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
                <!-- Certificate 1 -->
                <div class="certificate-card animate-on-scroll relative group" onclick="openModal('cert1')">
                    <div
                        class="bg-white rounded-2xl p-4 shadow-lg h-full flex flex-col items-center text-center relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="certificate-image relative z-10 w-full aspect-[3/4] bg-gray-100 rounded-xl mb-3 overflow-hidden">
                            <img src="{{ asset('assets/belgeler/uto1.jpg') }}" class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1 relative z-10">Ulusal Teknik Onay 1</h3>
                        <div class="certificate-badge relative z-10 mt-auto">
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                Görüntüle
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Certificate 2 -->
                <div class="certificate-card animate-on-scroll delay-100 relative group" onclick="openModal('cert2')">
                    <div
                        class="bg-white rounded-2xl p-4 shadow-lg h-full flex flex-col items-center text-center relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="certificate-image relative z-10 w-full aspect-[3/4] bg-gray-100 rounded-xl mb-3 overflow-hidden">
                            <img src="{{ asset('assets/belgeler/uto2.jpg') }}" alt="Ulusal Teknik Onay 2"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1 relative z-10">Ulusal Teknik Onay 2</h3>
                        <div class="certificate-badge relative z-10 mt-auto">
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                Görüntüle
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Certificate 3 -->
                <div class="certificate-card animate-on-scroll delay-200 relative group" onclick="openModal('cert3')">
                    <div
                        class="bg-white rounded-2xl p-4 shadow-lg h-full flex flex-col items-center text-center relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="certificate-image relative z-10 w-full aspect-[3/4] bg-gray-100 rounded-xl mb-3 overflow-hidden">
                            <img src="{{ asset('assets/belgeler/uto3.jpg') }}" alt="Ulusal Teknik Onay 3"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1 relative z-10">Ulusal Teknik Onay 3</h3>
                        <div class="certificate-badge relative z-10 mt-auto">
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                Görüntüle
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Certificate 4 -->
                <div class="certificate-card animate-on-scroll delay-300 relative group" onclick="openModal('cert4')">
                    <div
                        class="bg-white rounded-2xl p-4 shadow-lg h-full flex flex-col items-center text-center relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="certificate-image relative z-10 w-full aspect-[3/4] bg-gray-100 rounded-xl mb-3 overflow-hidden">
                            <img src="{{ asset('assets/belgeler/kapasite.jpg') }}" alt="Kapasite Raporu"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1 relative z-10">Kapasite Raporu</h3>
                        <div class="certificate-badge relative z-10 mt-auto">
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                Görüntüle
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Certificate 5 -->
                <div class="certificate-card animate-on-scroll delay-400 relative group" onclick="openModal('cert5')">
                    <div
                        class="bg-white rounded-2xl p-4 shadow-lg h-full flex flex-col items-center text-center relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="certificate-image relative z-10 w-full aspect-[3/4] bg-gray-100 rounded-xl mb-3 overflow-hidden">
                            <img src="{{ asset('assets/belgeler/marka.jpg') }}" alt="Marka Tescili"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1 relative z-10">Marka Tescili</h3>
                        <div class="certificate-badge relative z-10 mt-auto">
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                Görüntüle
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Certificate 6 -->
                <div class="certificate-card animate-on-scroll delay-500 relative group" onclick="openModal('cert6')">
                    <div
                        class="bg-white rounded-2xl p-4 shadow-lg h-full flex flex-col items-center text-center relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="certificate-image relative z-10 w-full aspect-[3/4] bg-gray-100 rounded-xl mb-3 overflow-hidden">
                            <img src="{{ asset('assets/belgeler/tse1.jpg') }}" alt="TSE 1 2024"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1 relative z-10">TSE 1 2024</h3>
                        <div class="certificate-badge relative z-10 mt-auto">
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                Görüntüle
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Certificate 7 -->
                <div class="certificate-card animate-on-scroll delay-600 relative group" onclick="openModal('cert7')">
                    <div
                        class="bg-white rounded-2xl p-4 shadow-lg h-full flex flex-col items-center text-center relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="certificate-image relative z-10 w-full aspect-[3/4] bg-gray-100 rounded-xl mb-3 overflow-hidden">
                            <img src="{{ asset('assets/belgeler/k1.jpg') }}" alt="K1" class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1 relative z-10">K1</h3>
                        <div class="certificate-badge relative z-10 mt-auto">
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                Görüntüle
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Certificate 8 -->
                <div class="certificate-card animate-on-scroll delay-100 relative group" onclick="openModal('cert8')">
                    <div
                        class="bg-white rounded-2xl p-4 shadow-lg h-full flex flex-col items-center text-center relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="certificate-image relative z-10 w-full aspect-[3/4] bg-gray-100 rounded-xl mb-3 overflow-hidden">
                            <img src="{{ asset('assets/belgeler/ce1.jpg') }}" alt="CE1"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1 relative z-10">CE1</h3>
                        <div class="certificate-badge relative z-10 mt-auto">
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                Görüntüle
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Certificate 9 -->
                <div class="certificate-card animate-on-scroll delay-200 relative group" onclick="openModal('cert9')">
                    <div
                        class="bg-white rounded-2xl p-4 shadow-lg h-full flex flex-col items-center text-center relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="certificate-image relative z-10 w-full aspect-[3/4] bg-gray-100 rounded-xl mb-3 overflow-hidden">
                            <img src="{{ asset('assets/belgeler/sanayi.jpg') }}" alt="Sanayi Sicil"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1 relative z-10">Sanayi Sicil</h3>
                        <div class="certificate-badge relative z-10 mt-auto">
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                Görüntüle
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Certificate 10 -->
                <div class="certificate-card animate-on-scroll delay-300 relative group" onclick="openModal('cert10')">
                    <div
                        class="bg-white rounded-2xl p-4 shadow-lg h-full flex flex-col items-center text-center relative overflow-hidden">
                        <div
                            class="absolute inset-0 bg-gradient-to-br from-green-50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        </div>
                        <div
                            class="certificate-image relative z-10 w-full aspect-[3/4] bg-gray-100 rounded-xl mb-3 overflow-hidden">
                            <img src="{{ asset('assets/belgeler/tse2.jpg') }}" alt="TSE 1 2024 +"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="font-bold text-gray-900 text-sm mb-1 relative z-10">TSE 1 2024 +</h3>
                        <div class="certificate-badge relative z-10 mt-auto">
                            <span class="text-xs font-semibold text-green-600 bg-green-100 px-3 py-1 rounded-full">
                                Görüntüle
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal for Certificate View -->
    <div id="certificateModal" class="modal">
        <button class="modal-close" onclick="closeModal()">
            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <div class="modal-content">
            <img id="modalImage" src="" alt="Certificate">
        </div>
    </div>

    <script>
        const certificates = {
            cert1: 'https://izobims.com/portfolio/p/2',
            cert2: 'https://izobims.com/portfolio/p/4',
            cert3: 'https://izobims.com/portfolio/p/3',
            cert4: 'https://izobims.com/portfolio/p/5',
            cert5: 'https://izobims.com/portfolio/p/6',
            cert6: 'https://izobims.com/portfolio/p/7',
            cert7: 'https://izobims.com/portfolio/p/8',
            cert8: 'https://izobims.com/portfolio/p/9',
            cert9: 'https://izobims.com/portfolio/p/10',
            cert10: 'https://izobims.com/portfolio/p/13'
        };

        function openModal(certId) {
            const modal = document.getElementById('certificateModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = certificates[certId] || '';
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            const modal = document.getElementById('certificateModal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });

        // Close modal on background click
        document.getElementById('certificateModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
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

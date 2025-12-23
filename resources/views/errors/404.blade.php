@php
    $site = \App\Services\ApiService::getSiteIdentity();
    $contact = \App\Services\ApiService::getContactData();
@endphp

<x-layout :site="$site" :contact="$contact">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <section class="min-h-screen pt-32 pb-20 bg-white dark:bg-gray-950 flex items-center justify-center overflow-hidden">
        <div class="container mx-auto px-6 md:px-12 flex flex-col items-center text-center">

            <div class="relative w-64 md:w-80 mb-8 mx-auto">
                <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full bg-orange-100 dark:bg-orange-600/10 blur-3xl rounded-full -z-10"></div>

                <lottie-player
                    src="{{ asset('animations/cat-notfound.json') }}"
                    background="transparent"
                    speed="1"
                    class="mx-auto"
                    style="width: 60%; height: auto;"
                    loop
                    autoplay
                ></lottie-player>
            </div>

            <div class="max-w-xl space-y-6 animate-in fade-in slide-in-from-bottom-5 duration-700">

                <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-gray-900 dark:text-white">
                    Halaman <span class="text-orange-600">Tidak Ditemukan</span>
                </h1>

                <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed font-medium">
                    Mohon maaf, halaman yang Anda tuju saat ini tidak tersedia, telah dipindahkan, atau tautan yang Anda gunakan tidak valid.
                </p>

                <div class="pt-4">
                    <a
                        href="{{ url('/') }}"
                        class="group relative inline-flex items-center justify-center px-8 py-3.5 text-base font-bold text-white transition-all duration-200 bg-orange-600 rounded-full hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 dark:focus:ring-offset-gray-900 shadow-lg shadow-orange-600/20 hover:shadow-orange-600/40 hover:-translate-y-1"
                    >
                        <svg
                            class="w-5 h-5 mr-2 -ml-1 transition-transform group-hover:-translate-x-1"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>

                <div class="pt-8 text-xs font-semibold text-gray-400 dark:text-gray-600 font-mono tracking-wider">
                    Error 404 • Pura Agung Kertajaya
                </div>

            </div>

        </div>
    </section>

</x-layout>

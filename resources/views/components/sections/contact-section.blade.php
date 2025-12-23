@props(['data' => null])

@php
    if (!$data) {
        return;
    }
@endphp

<section id="contact" class="py-20 md:py-24 bg-gray-50 dark:bg-gray-900 border-t border-gray-200 dark:border-gray-800 overflow-hidden">
    <div class="container mx-auto px-6 md:px-12">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 md:gap-8 mb-12 md:mb-16"
             data-aos="fade-up">
            <div class="space-y-3 md:space-y-4">
                <div class="flex items-center gap-3 md:gap-4">
                    <div class="h-[2px] w-8 md:w-12 bg-orange-600"></div>
                    <span class="text-orange-600 dark:text-orange-600 text-xs md:text-sm font-bold tracking-[0.2em] uppercase">
                        Lokasi & Kontak
                    </span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
                    Kunjungi <span class="text-orange-600">Kami</span>
                </h2>
            </div>
            <p class="text-gray-500 dark:text-gray-400 max-w-md text-sm md:text-base leading-relaxed text-left md:text-right">
                Kami menantikan kehadiran Anda. Berikut informasi lengkap untuk menghubungi dan mengunjungi Pura.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-start">

            <div
                class="lg:col-span-5 bg-white dark:bg-gray-800 rounded-3xl md:rounded-[2rem] p-6 md:p-10 shadow-xl shadow-gray-200/50 dark:shadow-none border border-gray-100 dark:border-gray-700"
                data-aos="fade-right"
            >
                <div class="flex gap-4 md:gap-5 mb-6 md:mb-8">
                    <div class="shrink-0 w-10 h-10 md:w-12 md:h-12 rounded-xl md:rounded-2xl bg-orange-50 dark:bg-orange-900/20 flex items-center justify-center text-orange-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="w-5 h-5 md:w-6 md:h-6">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-base md:text-lg text-gray-900 dark:text-white mb-1 md:mb-2">
                            Alamat</h4>
                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed text-sm md:text-base">
                            {{ $data['address'] }}
                        </p>
                    </div>
                </div>

                <hr class="border-dashed border-gray-200 dark:border-gray-700 mb-6 md:mb-8"/>

                <div class="space-y-5 md:space-y-6 mb-6 md:mb-8">
                    <div class="flex items-center gap-4 md:gap-5 group cursor-pointer">
                        <div class="shrink-0 w-10 h-10 md:w-12 md:h-12 rounded-xl md:rounded-2xl bg-orange-50 dark:bg-orange-900/20 flex items-center justify-center text-orange-600 group-hover:bg-orange-600 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="w-4 h-4 md:w-5 md:h-5">
                                <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                            </svg>
                        </div>
                        <div class="flex-1 overflow-hidden">
                            <h4 class="font-bold text-gray-900 dark:text-white text-sm">Telepon / WhatsApp</h4>
                            <a href="tel:{{ $data['phone'] }}"
                               class="text-gray-600 dark:text-gray-400 hover:text-orange-600 transition-colors text-sm md:text-base block truncate">
                                {{ $data['phone'] }}
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 md:gap-5 group cursor-pointer">
                        <div class="shrink-0 w-10 h-10 md:w-12 md:h-12 rounded-xl md:rounded-2xl bg-orange-50 dark:bg-orange-900/20 flex items-center justify-center text-orange-600 group-hover:bg-orange-600 group-hover:text-white transition-all duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="w-4 h-4 md:w-5 md:h-5">
                                <rect width="20" height="16" x="2" y="4" rx="2"/>
                                <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                            </svg>
                        </div>
                        <div class="flex-1 overflow-hidden">
                            <h4 class="font-bold text-gray-900 dark:text-white text-sm">Email</h4>
                            <a href="mailto:{{ $data['email'] }}"
                               class="text-gray-600 dark:text-gray-400 hover:text-orange-600 transition-colors text-sm md:text-base break-all line-clamp-1">
                                {{ $data['email'] }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 dark:bg-gray-700/50 rounded-2xl p-5 md:p-6 border border-gray-100 dark:border-gray-700">
                    <div class="flex items-center gap-2 md:gap-3 mb-2 text-orange-600 dark:text-orange-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="w-4 h-4 md:w-5 md:h-5">
                            <circle cx="12" cy="12" r="10"/>
                            <polyline points="12 6 12 12 16 14"/>
                        </svg>
                        <span class="font-bold uppercase tracking-wider text-[10px] md:text-xs">Jam Operasional</span>
                    </div>
                    <p class="text-gray-900 dark:text-white font-medium text-base md:text-lg">
                        {{ $data['visiting_hours'] }}
                    </p>
                </div>
            </div>

            <div class="lg:col-span-7 h-[350px] md:h-[450px] lg:h-full lg:min-h-[500px]" data-aos="fade-left"
                 data-aos-delay="200">
                <div class="relative w-full h-full rounded-3xl md:rounded-[2rem] overflow-hidden shadow-2xl bg-gray-200 group">
                    <iframe
                        src="{{ $data['map_embed_url'] }}"
                        width="100%"
                        height="100%"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="w-full h-full"
                    ></iframe>

                    <div class="absolute bottom-6 left-6 right-6 md:bottom-8 md:left-auto md:right-8">
                        <a
                            href="https://www.google.com/maps/search/?api=1&query={{ urlencode($data['address']) }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="
                                flex items-center justify-center gap-2 md:gap-3
                                bg-orange-600 hover:bg-orange-700 text-white
                                px-6 py-3 md:px-8 md:py-4 rounded-full
                                font-bold text-sm md:text-base
                                shadow-lg shadow-orange-600/30
                                transform transition-all duration-300 hover:scale-105 hover:-translate-y-1
                                w-full md:w-auto
                            "
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="w-4 h-4 md:w-5 md:h-5">
                                <polygon points="3 11 22 2 13 21 11 13 3 11"/>
                            </svg>

                            <span>Petunjuk Arah</span>

                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="w-4 h-4 opacity-70">
                                <path d="M5 12h14"/>
                                <path d="m12 5 7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

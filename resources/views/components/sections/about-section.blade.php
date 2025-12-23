@props(['data' => null])

@php
    if (!$data) {
        return;
    }
@endphp

<section id="about" class="relative py-16 md:py-24 bg-white dark:bg-gray-950 overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full opacity-[0.03] dark:opacity-[0.05] pointer-events-none">
        <div class="w-full h-full bg-[radial-gradient(#f97316_1px,transparent_1px)] [background-size:20px_20px]"></div>
    </div>

    <div class="container mx-auto px-6 md:px-12 relative z-10">
        <div class="flex flex-col-reverse lg:grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">

            <div class="space-y-6 md:space-y-8 w-full" data-aos="fade-right">
                <div class="space-y-4 md:space-y-6">
                    <div class="flex items-center gap-4">
                        <div class="h-[2px] w-8 md:w-12 bg-orange-600"></div>
                        <span class="text-orange-600 dark:text-orange-600 text-xs md:text-sm font-bold tracking-[0.2em] uppercase">
                            Tentang Kami
                        </span>
                    </div>

                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
                        Pura Agung <span class="text-orange-600">Kertajaya</span>
                    </h2>

                    <p class="text-gray-600 dark:text-gray-400 text-base md:text-lg leading-relaxed text-justify line-clamp-4">
                        {{ $data['description'] }}
                    </p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-y-6 sm:gap-y-0 sm:gap-x-10 py-6 border-y border-gray-100 dark:border-gray-800">
                    @if(isset($data['values']) && is_array($data['values']))
                        @foreach(array_slice($data['values'], 0, 3) as $val)
                            <div class="flex flex-col">
                                <p class="text-sm sm:text-base font-semibold uppercase text-gray-800 dark:text-gray-400 mb-2">
                                    {{ $val['title'] }}
                                </p>
                                <p class="text-sm leading-[1.65] text-gray-600 dark:text-gray-400 max-w-full sm:max-w-[260px] sm:min-h-[72px]">
                                    {{ $val['value'] }}
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="pt-2 flex justify-center lg:justify-start">
                    <a
                        href="/about"
                        class="group inline-flex items-center gap-2 text-orange-600 font-semibold hover:text-orange-700 transition-colors text-sm md:text-base"
                    >
                        Pelajari Sejarah Kami
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 group-hover:translate-x-1 transition-transform"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

            <div class="relative w-full px-2 md:px-0" data-aos="fade-left">
                <div class="hidden md:block absolute top-0 right-0 w-full h-full transform translate-x-6 translate-y-6 rotate-6 -z-10">
                    <div class="w-full h-full rounded-2xl overflow-hidden opacity-40 grayscale contrast-125 border-2 border-gray-200 dark:border-gray-700">
                        <img
                            src="{{ $data['image_url'] }}"
                            class="w-full h-full object-cover"
                            alt="Background Layer"
                        >
                    </div>
                </div>

                <div class="relative aspect-video md:aspect-[4/3] rounded-xl md:rounded-2xl overflow-hidden shadow-xl border-4 md:border-[6px] border-white dark:border-gray-800 group">
                    <img
                        src="{{ $data['image_url'] }}"
                        alt="Pura Agung Kertajaya"
                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 ease-in-out"
                    >
                    <div class="absolute inset-0 bg-gradient-to-tr from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                </div>

                <div class="absolute -bottom-6 left-4 md:-bottom-8 md:-left-12 bg-white dark:bg-gray-800 p-2.5 md:p-5 rounded-lg md:rounded-2xl shadow-xl md:shadow-2xl border border-gray-100 dark:border-gray-700 z-30 min-w-[140px] md:min-w-[200px]">
                    <div class="flex items-center gap-2 md:gap-3 mb-1">
                        <div class="relative flex h-2 w-2 md:h-3 md:w-3">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 md:h-3 md:w-3 bg-orange-500"></span>
                        </div>
                        <span class="text-[9px] md:text-xs font-bold text-orange-600 uppercase tracking-wider">
                            Lokasi
                        </span>
                    </div>
                    <p class="text-xs md:text-sm font-bold text-gray-900 dark:text-gray-100 leading-tight">
                        Pura Agung Kertajaya
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

@props(['data' => []])

@php
    if (empty($data)) {
        return;
    }

    $displayData = $data;
    if (count($data) < 5) {
        $displayData = array_merge($data, $data, $data, $data);
    } else {
        $displayData = array_merge($data, $data);
    }
@endphp

<section class="py-24 bg-white dark:bg-gray-950 relative border-t border-gray-100 dark:border-gray-800 w-full overflow-hidden">
    <div class="container mx-auto px-6 md:px-12 relative z-10 mb-12">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8" data-aos="fade-up">
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="h-[2px] w-12 bg-orange-600"></div>
                    <span class="text-orange-600 dark:text-orange-600 text-sm font-bold tracking-[0.2em] uppercase">
                        Kata Mereka
                    </span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
                    Pengalaman <span class="text-orange-600">Spiritual</span>
                </h2>
            </div>
            <p class="text-gray-500 dark:text-gray-400 max-w-md text-sm md:text-base leading-relaxed text-left md:text-right">
                Kesan tulus dari para pengunjung yang telah merasakan kedamaian dan keharmonisan di Pura Agung Kertajaya.
            </p>
        </div>
    </div>

    <div
        class="relative z-10 w-full overflow-hidden"
        x-data="{ paused: false }"
        @mouseenter="paused = true"
        @mouseleave="paused = false"
    >
        <div class="absolute top-0 left-0 bottom-0 w-20 md:w-32 bg-gradient-to-r from-white dark:from-gray-950 to-transparent z-20 pointer-events-none"></div>
        <div class="absolute top-0 right-0 bottom-0 w-20 md:w-32 bg-gradient-to-l from-white dark:from-gray-950 to-transparent z-20 pointer-events-none"></div>

        <div class="flex py-4 w-max">
            <div
                class="flex gap-6 animate-marquee"
                :style="paused ? 'animation-play-state: paused;' : ''"
            >
                @foreach($displayData as $index => $testimonial)
                    <div class="
                        relative shrink-0 mx-3
                        w-[350px] md:w-[350px]
                        h-[200px] md:h-[200px]
                        p-5 md:p-6 rounded-2xl
                        bg-gray-50 dark:bg-gray-800
                        border border-gray-100 dark:border-gray-700
                        shadow-sm hover:shadow-lg hover:shadow-orange-500/5 hover:-translate-y-1
                        transition-all duration-500
                        flex flex-col justify-between overflow-hidden
                    ">
                        <div class="absolute top-4 right-5 opacity-5 pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="currentColor" stroke="none" class="text-orange-500"><path d="M3 21c3 0 7-1 7-8V5c0-1.25-.756-2.017-2-2H6c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/><path d="M15 21c3 0 7-1 7-8V5c0-1.25-.757-2.017-2-2h-2c-1.25 0-2 .75-2 1.972V11c0 1.25.75 2 2 2 1 0 1 0 1 1v1c0 1-1 2-2 2s-1 .008-1 1.031V20c0 1 0 1 1 1z"/></svg>
                        </div>

                        <div>
                            <div class="flex gap-0.5 mb-3">
                                @for($i = 0; $i < 5; $i++)
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="{{ $i < $testimonial['rating'] ? '#F97316' : 'transparent' }}" stroke="{{ $i < $testimonial['rating'] ? '#F97316' : '#E5E7EB' }}" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                @endfor
                            </div>

                            <div class="relative z-10">
                                <p class="text-gray-600 dark:text-gray-300 text-sm leading-relaxed line-clamp-4 md:line-clamp-2 italic">
                                    "{{ $testimonial['comment'] }}"
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-3 pt-3 border-t border-gray-200 dark:border-gray-700 mt-auto">
                            <div class="relative w-8 h-8 md:w-10 md:h-10 rounded-full overflow-hidden border border-gray-200 dark:border-gray-600 shrink-0">
                                <img
                                    src="{{ $testimonial['avatar_url'] }}"
                                    alt="{{ $testimonial['name'] }}"
                                    class="w-full h-full object-cover"
                                    loading="lazy"
                                />
                            </div>
                            <div class="min-w-0">
                                <p class="font-bold text-gray-900 dark:text-white text-sm truncate">
                                    {{ $testimonial['name'] }}
                                </p>
                                <p class="text-[10px] text-orange-600 dark:text-orange-400 font-bold uppercase tracking-wider">
                                    Pengunjung
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            animation: marquee 40s linear infinite;
        }
    </style>
</section>

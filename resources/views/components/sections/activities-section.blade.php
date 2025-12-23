@props(['data' => []])

@php
    if (empty($data)) {
        return;
    }
@endphp

<section
    id="activities"
    class="py-24 bg-white dark:bg-gray-950 overflow-hidden border-t border-gray-100 dark:border-gray-900"
    x-data="{
        activeIndex: 0,
        selectedActivity: null,

        handleScroll(e) {
            const container = e.target;
            const scrollLeft = container.scrollLeft;
            const itemWidth = container.clientWidth * 0.85;
            const newIndex = Math.round(scrollLeft / itemWidth);
            this.activeIndex = Math.min(Math.max(newIndex, 0), {{ count($data) }} - 1);
        },

        closeModal() {
            this.selectedActivity = null;
            document.body.style.overflow = '';
        },

        openModal(activity) {
            this.selectedActivity = activity;
            document.body.style.overflow = 'hidden';
        }
    }"
    @keydown.window.escape="closeModal()"
>
    <div class="container mx-auto px-6 md:px-12">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16" data-aos="fade-up">
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="h-[2px] w-12 bg-orange-600"></div>
                    <span class="text-orange-600 dark:text-orange-600 text-sm font-bold tracking-[0.2em] uppercase">
                        Agenda Pura
                    </span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
                    Jadwal & <span class="text-orange-600">Kegiatan</span>
                </h2>
            </div>
            <p class="text-gray-500 dark:text-gray-400 max-w-md text-sm md:text-base leading-relaxed text-left md:text-right">
                Saksikan dan ikuti beragam kegiatan spiritual serta tradisi budaya kami yang akan datang.
            </p>
        </div>

        <div
            @scroll="handleScroll($event)"
            class="
                flex flex-nowrap overflow-x-auto overflow-y-hidden snap-x snap-mandatory gap-6 pb-12 -mx-6 px-6
                md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-8 md:pb-0 md:mx-0 md:px-0 md:overflow-visible
                [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]
            "
        >
            @foreach($data as $index => $activity)
                <div
                    key="{{ $activity['id'] }}"
                    @click="openModal({{ \Illuminate\Support\Js::from($activity) }})"
                    class="
                        group relative flex flex-col justify-between cursor-pointer
                        w-[85%] md:w-auto flex-shrink-0 snap-center
                        bg-gray-50 dark:bg-gray-900 rounded-3xl p-6 md:p-8
                        border border-gray-100 dark:border-gray-800
                        md:hover:border-orange-200 dark:md:hover:border-orange-900
                        transition-all duration-500
                        md:hover:-translate-y-2 md:hover:shadow-xl md:hover:shadow-orange-500/5
                    "
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 100 }}"
                >
                    <div class="flex justify-between items-start mb-6">
                        <div
                            class="inline-flex items-center gap-2 px-3 py-1.5 md:px-4 md:py-2 rounded-full bg-white dark:bg-gray-800 border border-gray-100 dark:border-gray-700 shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="w-3.5 h-3.5 md:w-4 md:h-4 text-orange-500">
                                <circle cx="12" cy="12" r="10"/>
                                <polyline points="12 6 12 12 16 14"/>
                            </svg>
                            <span class="text-xs md:text-sm font-semibold text-gray-600 dark:text-gray-300">
                                {{ $activity['time_info'] }}
                            </span>
                        </div>

                        <div
                            class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white dark:bg-gray-800 flex items-center justify-center text-gray-300 md:group-hover:text-orange-500 md:group-hover:bg-orange-50 dark:md:group-hover:bg-orange-900/20 transition-all duration-500 border border-gray-100 dark:border-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round"
                                 class="w-5 h-5 md:w-6 md:h-6 transform md:group-hover:rotate-45 transition-transform duration-500">
                                <path d="M7 7h10v10"/>
                                <path d="M7 17 17 7"/>
                            </svg>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white mb-3 md:group-hover:text-orange-600 transition-colors">
                                {{ $activity['title'] }}
                            </h3>

                            <p class="text-gray-500 dark:text-gray-400 leading-relaxed line-clamp-3 text-sm md:text-base">
                                {{ $activity['description'] }}
                            </p>

                            <p class="mt-4 text-sm font-bold text-orange-600 opacity-0 -translate-y-2 md:group-hover:opacity-100 md:group-hover:translate-y-0 transition-all duration-300 hidden md:block">
                                Baca Selengkapnya
                            </p>
                        </div>
                    </div>

                    <div
                        class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-800 flex items-center gap-2 text-gray-500 dark:text-gray-400 text-xs md:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="w-3.5 h-3.5 md:w-4 md:h-4">
                            <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
                            <circle cx="12" cy="10" r="3"/>
                        </svg>
                        <span class="font-medium truncate">{{ $activity['location'] }}</span>
                    </div>
                </div>
            @endforeach

            <div class="w-[5%] flex-shrink-0 md:hidden"></div>
        </div>

        <div class="flex md:hidden justify-center gap-2 -mt-4 mb-4">
            @foreach($data as $index => $item)
                <div
                    class="h-1.5 rounded-full transition-all duration-300"
                    :class="activeIndex === {{ $index }} ? 'w-8 bg-orange-500' : 'w-1.5 bg-gray-300 dark:bg-gray-700'"
                ></div>
            @endforeach
        </div>

        <template x-if="selectedActivity">
            <x-sections.activities.activity-modal/>
        </template>

    </div>
</section>

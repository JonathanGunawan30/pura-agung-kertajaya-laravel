@props(['data' => []])

@php
    if (empty($data)) {
        return;
    }
@endphp

<section
    id="facilities"
    class="py-24 bg-gray-50 dark:bg-gray-900 overflow-hidden"
    x-data="{
        activeFacility: {{ \Illuminate\Support\Js::from($data[0] ?? null) }},
        facilities: {{ \Illuminate\Support\Js::from($data) }},
        isAutoPlaying: true,
        intervalId: null,

        setActive(facility) {
            this.activeFacility = facility;
            this.isAutoPlaying = false;
            this.scrollTabIntoView(facility.id);
        },

        startAutoplay() {
            this.intervalId = setInterval(() => {
                if (!this.isAutoPlaying) return;

                const currentIndex = this.facilities.findIndex(f => f.id === this.activeFacility.id);
                const nextIndex = (currentIndex + 1) % this.facilities.length;

                this.activeFacility = this.facilities[nextIndex];

                this.scrollTabIntoView(this.activeFacility.id);
            }, 4000);
        },

        stopAutoplay() {
            this.isAutoPlaying = false;
        },

        resumeAutoplay() {
            this.isAutoPlaying = true;
        },

        scrollTabIntoView(id) {
            const container = this.$refs.tabsContainer;
            if (!container) return;

            const tabNode = container.querySelector(`[data-id='${id}']`);
            if (!tabNode) return;

            const containerWidth = container.offsetWidth;
            const tabWidth = tabNode.offsetWidth;
            const tabLeft = tabNode.offsetLeft;

            const newScrollLeft = tabLeft - (containerWidth / 2) + (tabWidth / 2);

            container.scrollTo({
                left: newScrollLeft,
                behavior: 'smooth'
            });
        },

        init() {
            if (this.facilities.length > 0) {
                this.startAutoplay();
            }
        }
    }"
>
    <div class="container mx-auto px-6 md:px-12">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-12 md:mb-16" data-aos="fade-up">
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="h-[2px] w-12 bg-orange-600"></div>
                    <span class="text-orange-600 dark:text-orange-600 text-sm font-bold tracking-[0.2em] uppercase">
                        Fasilitas Umum
                    </span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
                    Kenyamanan <span class="text-orange-600">Pengunjung</span>
                </h2>
            </div>
            <p class="text-gray-500 dark:text-gray-400 max-w-md text-sm md:text-base leading-relaxed text-left md:text-right">
                Berbagai fasilitas untuk menunjang kekhusyukan dan kenyamanan umat.
            </p>
        </div>

        <div class="hidden lg:grid grid-cols-12 gap-8 h-[600px]">
            <div
                class="col-span-4 flex flex-col gap-3 overflow-y-auto pr-2 custom-scrollbar"
                @mouseenter="stopAutoplay()"
                @mouseleave="resumeAutoplay()"
                data-aos="fade-right"
            >
                @foreach($data as $facility)
                    <div
                        key="{{ $facility['id'] }}"
                        @click="setActive({{ \Illuminate\Support\Js::from($facility) }})"
                        class="group relative p-6 rounded-2xl cursor-pointer transition-all duration-300 border"
                        :class="activeFacility.id === '{{ $facility['id'] }}'
                            ? 'bg-white dark:bg-gray-800 border-orange-500/30 shadow-lg translate-x-2'
                            : 'bg-transparent border-transparent hover:bg-white/50 dark:hover:bg-gray-800/50 hover:border-gray-200'"
                    >
                        <div class="flex justify-between items-center mb-2">
                            <h3
                                class="font-bold text-lg transition-colors"
                                :class="activeFacility.id === '{{ $facility['id'] }}' ? 'text-orange-600' : 'text-gray-700 dark:text-gray-300'"
                            >
                                {{ $facility['name'] }}
                            </h3>

                            <div x-show="activeFacility.id === '{{ $facility['id'] }}'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500 animate-pulse"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                            </div>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2 leading-relaxed">
                            {{ $facility['description'] }}
                        </p>
                    </div>
                @endforeach
            </div>

            <div class="col-span-8 relative rounded-3xl overflow-hidden shadow-2xl bg-gray-200 dark:bg-gray-800" data-aos="fade-left">
                <template x-if="activeFacility">
                    <div class="relative w-full h-full animate-in fade-in zoom-in-105 duration-700">
                        <img :src="activeFacility.image_url" :alt="activeFacility.name" class="w-full h-full object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-6 left-6 right-6 md:max-w-xl p-8 bg-white dark:bg-gray-900 rounded-2xl shadow-2xl">
                            <div class="flex items-center gap-2 mb-3 text-orange-600 dark:text-orange-400 font-bold uppercase text-xs tracking-widest">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                                Fasilitas Tersedia
                            </div>
                            <h3 class="text-2xl md:text-3xl font-bold mb-3 text-gray-900 dark:text-white" x-text="activeFacility.name"></h3>
                            <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-base md:text-lg" x-text="activeFacility.description"></p>
                        </div>
                    </div>
                </template>
            </div>
        </div>

        <div class="lg:hidden flex flex-col gap-6" data-aos="fade-up">

            <div class="relative w-full aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl bg-gray-200 dark:bg-gray-800 border-4 border-white dark:border-gray-800">
                <template x-if="activeFacility">
                    <div class="relative w-full h-full animate-in fade-in duration-500">
                        <img :src="activeFacility.image_url" :alt="activeFacility.name" class="w-full h-full object-cover" loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                        <div class="absolute top-4 right-4 bg-white/20 backdrop-blur-md px-3 py-1 rounded-full border border-white/20">
                            <div class="flex items-center gap-1.5 text-xs font-bold text-white uppercase tracking-wider">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-400 fill-orange-400"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                Featured
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            <div
                x-ref="tabsContainer"
                class="
                    flex overflow-x-auto gap-3 py-2 px-1 -mx-6 px-6 snap-x scroll-smooth
                    [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]
                "
            >
                @foreach($data as $facility)
                    <button
                        key="{{ $facility['id'] }}"
                        data-id="{{ $facility['id'] }}"
                        @click="setActive({{ \Illuminate\Support\Js::from($facility) }})"
                        class="flex-shrink-0 snap-center px-5 py-2.5 rounded-full text-sm font-bold transition-all duration-300 border"
                        :class="activeFacility.id === '{{ $facility['id'] }}'
                            ? 'bg-gray-900 dark:bg-white text-white dark:text-gray-900 border-gray-900 dark:border-white shadow-lg scale-105'
                            : 'bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400 border-gray-200 dark:border-gray-700 hover:border-orange-300'"
                    >
                        {{ $facility['name'] }}
                    </button>
                @endforeach
            </div>

            <div class="bg-white dark:bg-gray-800 p-6 rounded-3xl border border-gray-100 dark:border-gray-700 shadow-sm min-h-[140px] flex flex-col justify-center transition-all">
                <template x-if="activeFacility">
                    <div class="animate-in slide-in-from-bottom-2 fade-in duration-500">
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-2 flex items-center gap-2">
                            <span x-text="activeFacility.name"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>
                        </h3>
                        <p class="text-gray-500 dark:text-gray-400 leading-relaxed text-sm md:text-base" x-text="activeFacility.description"></p>
                    </div>
                </template>
            </div>

        </div>

    </div>
</section>

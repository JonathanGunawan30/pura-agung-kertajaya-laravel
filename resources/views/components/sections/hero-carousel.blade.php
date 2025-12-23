@props(['slides' => [], 'site' => null])

@php
    if (empty($slides) || !$site) {
        return;
    }
@endphp

<section
    id="home"
    class="relative h-screen w-full overflow-hidden bg-black"
    x-data="{
        currentSlide: 0,
        totalSlides: {{ count($slides) }},
        autoplayInterval: null,

        next() {
            this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
        },

        prev() {
            this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        },

        startAutoplay() {
            this.autoplayInterval = setInterval(() => {
                this.next();
            }, 6000);
        },

        stopAutoplay() {
            clearInterval(this.autoplayInterval);
        },

        init() {
            this.startAutoplay();
        }
    }"
    @mouseenter="stopAutoplay()"
    @mouseleave="startAutoplay()"
>
    <div class="absolute inset-0">
        @foreach($slides as $index => $slide)
            <div
                class="absolute inset-0 transition-opacity duration-2000 ease-in-out"
                :class="currentSlide === {{ $index }} ? 'opacity-100 z-10' : 'opacity-0 z-0'"
            >
                <div class="relative w-full h-full">
                    <img
                        src="{{ $slide['image_url'] }}"
                        alt="Hero Slide {{ $index + 1 }}"
                        class="absolute inset-0 w-full h-full object-cover transition-transform ease-linear"
                        :class="currentSlide === {{ $index }}
                            ? 'scale-110 duration-[10000ms]'
                            : 'scale-100 duration-0 delay-[2000ms]'"
                    >

                    <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/20 to-black/80"></div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="absolute inset-0 z-20 flex items-center justify-center px-4 md:px-12">
        <div class="text-center max-w-4xl mx-auto space-y-6 md:space-y-8">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-extrabold text-white leading-tight drop-shadow-2xl">
                {{ $site['site_name'] }}
            </h1>

            <p class="text-lg md:text-2xl text-gray-200 font-light max-w-2xl mx-auto leading-relaxed drop-shadow-lg">
                {{ $site['tagline'] }}
            </p>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-4 md:pt-8">
                <a
                    href="{{ $site['primary_button_link'] }}"
                    class="group px-8 py-4 bg-orange-600 hover:bg-orange-700 text-white font-bold rounded-full transition-all duration-300 hover:scale-105 shadow-lg shadow-orange-600/30 flex items-center gap-2"
                >
                    {{ $site['primary_button_text'] }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 group-hover:translate-x-1 transition-transform"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                </a>

                <a
                    href="{{ $site['secondary_button_link'] }}"
                    class="px-8 py-4 bg-white/10 hover:bg-white/20 border border-white/30 backdrop-blur-sm text-white font-semibold rounded-full transition-all duration-300 hover:scale-105"
                >
                    {{ $site['secondary_button_text'] }}
                </a>
            </div>
        </div>
    </div>

    <button
        @click="prev()"
        class="hidden md:flex absolute left-8 top-1/2 -translate-y-1/2 z-30 w-12 h-12 items-center justify-center rounded-full bg-white/10 hover:bg-orange-600 border border-white/10 backdrop-blur-md text-white transition-all duration-300"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="m15 18-6-6 6-6"/></svg>
    </button>

    <button
        @click="next()"
        class="hidden md:flex absolute right-8 top-1/2 -translate-y-1/2 z-30 w-12 h-12 items-center justify-center rounded-full bg-white/10 hover:bg-orange-600 border border-white/10 backdrop-blur-md text-white transition-all duration-300"
    >
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="m9 18 6-6-6-6"/></svg>
    </button>

    <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-30 flex items-center gap-3">
        @foreach($slides as $index => $slide)
            <button
                @click="currentSlide = {{ $index }}"
                class="h-1.5 rounded-full transition-all duration-500"
                :class="currentSlide === {{ $index }} ? 'w-8 bg-orange-500' : 'w-2 bg-white/40 hover:bg-white/80'"
                aria-label="Go to slide {{ $index + 1 }}"
            ></button>
        @endforeach
    </div>

</section>

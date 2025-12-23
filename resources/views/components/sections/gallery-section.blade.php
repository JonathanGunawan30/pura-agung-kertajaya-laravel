@props(['data' => []])

@php
    if (empty($data)) {
        return;
    }

    $displayData = array_slice($data, 0, 6);
@endphp

<section
    id="gallery"
    class="py-24 bg-gray-50 dark:bg-gray-900 overflow-hidden"
    x-data="{
        activeSlide: null,
        mobileActiveIndex: 0,
        images: {{ \Illuminate\Support\Js::from($displayData) }},

        open(index) {
            this.activeSlide = index;
            document.body.style.overflow = 'hidden';
        },

        close() {
            this.activeSlide = null;
            document.body.style.overflow = '';
        },

        next() {
            if (this.activeSlide === null) return;
            this.activeSlide = (this.activeSlide === this.images.length - 1) ? 0 : this.activeSlide + 1;
        },

        prev() {
            if (this.activeSlide === null) return;
            this.activeSlide = (this.activeSlide === 0) ? this.images.length - 1 : this.activeSlide - 1;
        },

        handleScroll(e) {
            const container = e.target;
            const scrollLeft = container.scrollLeft;
            const itemWidth = container.clientWidth * 0.85;
            const newIndex = Math.round(scrollLeft / itemWidth);
            this.mobileActiveIndex = Math.min(Math.max(newIndex, 0), this.images.length - 1);
        }
    }"
    @keydown.window.escape="close()"
    @keydown.window.arrow-right="next()"
    @keydown.window.arrow-left="prev()"
>
    <div class="container mx-auto px-6 md:px-12">

        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-12" data-aos="fade-up">
            <div class="space-y-4">
                <div class="flex items-center gap-4">
                    <div class="h-[2px] w-12 bg-orange-600"></div>
                    <span class="text-orange-600 dark:text-orange-600 text-sm font-bold tracking-[0.2em] uppercase">
                        Galeri Foto
                    </span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white leading-tight">
                    Momen di <span class="text-orange-600">Pura</span>
                </h2>
            </div>
            <p class="text-gray-500 dark:text-gray-400 max-w-md text-sm md:text-base leading-relaxed text-left md:text-right">
                Kumpulan dokumentasi kegiatan keagamaan, sosial, dan budaya yang mengabadikan keharmonisan umat.
            </p>
        </div>

        <div
            @scroll="handleScroll($event)"
            class="
                flex flex-nowrap overflow-x-auto overflow-y-hidden snap-x snap-mandatory gap-4 pb-8 -mx-6 px-6
                md:grid md:grid-cols-4 md:gap-4 md:pb-0 md:mx-0 md:px-0 md:overflow-visible
                [&::-webkit-scrollbar]:hidden [-ms-overflow-style:none] [scrollbar-width:none]
            "
        >
            @foreach($displayData as $index => $item)
                @php
                    $isLarge = ($index === 0 || $index === 1);

                    $gridClass = $isLarge
                        ? 'md:col-span-2 md:row-span-2 md:h-[450px]'
                        : 'md:col-span-1 md:h-[220px]';
                @endphp

                <div
                    @click="open({{ $index }})"
                    data-aos="fade-up"
                    data-aos-delay="{{ $index * 100 }}"
                    class="
                        {{ $gridClass }}
                        relative group rounded-2xl overflow-hidden cursor-pointer flex-shrink-0
                        shadow-sm hover:shadow-xl transition-all duration-300
                        bg-gray-100 dark:bg-gray-800
                        w-[85%] h-[400px] snap-center md:w-auto
                    "
                >
                    <img
                        src="{{ $item['image_url'] }}"
                        alt="{{ $item['title'] }}"
                        loading="lazy"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                    />

                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/90 via-black/50 to-transparent translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <p class="text-white font-bold truncate {{ $index < 2 ? 'text-lg md:text-xl' : 'text-sm' }}">
                            {{ $item['title'] }}
                        </p>

                        <p class="text-white/70 text-[10px] uppercase tracking-wider mt-0.5 opacity-0 group-hover:opacity-100 transition-opacity delay-75">
                            Lihat Foto
                        </p>
                    </div>
                </div>
            @endforeach

            <div class="w-[5%] flex-shrink-0 md:hidden"></div>
        </div>

        <div class="flex md:hidden justify-center gap-2 -mt-4 mb-8">
            @foreach($displayData as $index => $item)
                <div
                    class="h-1.5 rounded-full transition-all duration-300"
                    :class="mobileActiveIndex === {{ $index }} ? 'w-8 bg-orange-500' : 'w-1.5 bg-gray-300 dark:bg-gray-700'"
                ></div>
            @endforeach
        </div>

        <div class="mt-4 md:mt-12 text-center" data-aos="fade-up">
            <a href="/gallery">
                <button class="group inline-flex items-center gap-3 px-8 py-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-full shadow-sm hover:shadow-lg hover:border-orange-500 transition-all duration-300">
                    <span class="font-bold text-gray-900 dark:text-white group-hover:text-orange-600">Lihat Semua Galeri</span>
                    <div class="w-8 h-8 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center group-hover:bg-orange-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-gray-600 dark:text-gray-300 group-hover:text-white"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </div>
                </button>
            </a>
        </div>

        <template x-if="activeSlide !== null">
            <div
                class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/95 backdrop-blur-sm"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click="close()"
            >
                <div class="relative w-full h-full flex items-center justify-center p-4 md:p-8" @click.stop>
                    <img
                        :src="images[activeSlide].image_url"
                        :alt="images[activeSlide].title"
                        class="max-w-full max-h-[80vh] md:max-h-[85vh] object-contain rounded-sm shadow-2xl"
                    />
                </div>

                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/80 to-transparent pt-24 pb-8 px-6 md:px-12 pointer-events-none">
                    <div class="container mx-auto max-w-6xl flex flex-col md:flex-row justify-between items-end gap-4">
                        <div class="text-left space-y-2 pointer-events-auto">
                            <h3 class="text-2xl md:text-3xl font-bold text-white" x-text="images[activeSlide].title"></h3>
                            <p class="text-gray-300 text-sm md:text-base max-w-2xl line-clamp-2 md:line-clamp-none" x-text="images[activeSlide].description"></p>
                        </div>
                        <div class="text-white font-mono text-sm md:text-lg tracking-widest opacity-80 whitespace-nowrap">
                            <span x-text="activeSlide + 1"></span> / <span x-text="images.length"></span>
                        </div>
                    </div>
                </div>

                <button @click.stop="prev()" class="absolute left-4 top-1/2 -translate-y-1/2 p-3 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all border border-white/10 hover:scale-110 hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                </button>

                <button @click.stop="next()" class="absolute right-4 top-1/2 -translate-y-1/2 p-3 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all border border-white/10 hover:scale-110 hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                </button>

                <button @click="close()" class="absolute top-6 right-6 p-2 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all border border-white/10 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:rotate-90 transition-transform"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </template>
    </div>
</section>

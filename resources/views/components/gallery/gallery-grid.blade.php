@props(['items' => []])

<div
    class="space-y-10"
    x-data="{
        items: {{ \Illuminate\Support\Js::from($items) }},
        searchQuery: '',
        selectedIndex: null,
        mobileColumns: 1,
        touchStart: 0,
        touchEnd: 0,
        isSearchFocused: false,

        get filteredItems() {
            if (this.searchQuery === '') return this.items;
            const lower = this.searchQuery.toLowerCase();
            return this.items.filter(item =>
                item.title.toLowerCase().includes(lower) ||
                item.description.toLowerCase().includes(lower)
            );
        },

        get activeImage() {
            if (this.selectedIndex === null) return null;
            return this.filteredItems[this.selectedIndex];
        },

        next() {
            if (this.selectedIndex === null) return;
            this.selectedIndex = (this.selectedIndex === this.filteredItems.length - 1) ? 0 : this.selectedIndex + 1;
        },

        prev() {
            if (this.selectedIndex === null) return;
            this.selectedIndex = (this.selectedIndex === 0) ? this.filteredItems.length - 1 : this.selectedIndex - 1;
        },

        close() {
            this.selectedIndex = null;
        },

        handleTouchStart(e) {
            this.touchEnd = 0;
            this.touchStart = e.changedTouches[0].screenX;
        },

        handleTouchMove(e) {
            this.touchEnd = e.changedTouches[0].screenX;
        },

        handleTouchEnd() {
            if (!this.touchStart || !this.touchEnd) return;
            const distance = this.touchStart - this.touchEnd;
            const minSwipeDistance = 50;

            if (distance > minSwipeDistance) this.next();
            if (distance < -minSwipeDistance) this.prev();
        },

        init() {
            this.$watch('selectedIndex', value => {
                document.body.style.overflow = value !== null ? 'hidden' : '';
            });

            this.$watch('searchQuery', () => {
                this.selectedIndex = null;
            });
        }
    }"
    @keydown.window.arrow-right="next()"
    @keydown.window.arrow-left="prev()"
    @keydown.window.escape="close()"
>

    <div class="relative z-30 flex justify-center px-4 md:px-0">
        <div
            class="
                flex flex-col md:flex-row items-center gap-3 md:gap-4
                w-full max-w-2xl
                bg-white/90 dark:bg-gray-900/90 backdrop-blur-xl
                p-2 md:p-3 rounded-2xl md:rounded-full
                shadow-[0_8px_30px_rgb(0,0,0,0.08)] border border-white/20 dark:border-gray-800
                transition-all duration-300
            "
            :class="isSearchFocused ? 'ring-2 ring-orange-500/20 shadow-orange-500/10 scale-[1.01]' : ''"
        >
            <div class="relative w-full flex-grow group">
                <div
                    class="absolute left-3 md:left-4 top-1/2 -translate-y-1/2 transition-colors duration-300"
                    :class="isSearchFocused ? 'text-orange-500' : 'text-gray-400 group-hover:text-gray-600'"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
                </div>

                <input
                    type="text"
                    placeholder="Cari momen..."
                    x-model="searchQuery"
                    @focus="isSearchFocused = true"
                    @blur="isSearchFocused = false"
                    class="w-full h-11 md:h-12 pl-10 md:pl-12 pr-4 rounded-xl md:rounded-full bg-gray-50 dark:bg-gray-800 border-transparent focus:bg-white dark:focus:bg-gray-950 outline-none text-base transition-all placeholder:text-gray-400 text-gray-800 dark:text-gray-100"
                />

                <button
                    x-show="searchQuery.length > 0"
                    @click="searchQuery = ''"
                    class="absolute right-3 top-1/2 -translate-y-1/2 p-1 rounded-full bg-gray-200 dark:bg-gray-700 text-gray-500 hover:text-red-500 transition-colors"
                    style="display: none;"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>

            <div class="flex items-center justify-between w-full md:w-auto gap-4 pl-2 md:pl-0 pr-2 md:pr-1">
                <div class="hidden md:block text-xs font-medium text-gray-500 whitespace-nowrap px-2">
                    <span class="text-orange-600 font-bold" x-text="filteredItems.length"></span> Foto
                </div>

                <div class="md:hidden text-xs font-bold text-gray-400">
                    <span x-text="filteredItems.length"></span> Hasil
                </div>

                <div class="flex md:hidden bg-gray-100 dark:bg-gray-800 p-1 rounded-lg shrink-0">
                    <button
                        @click="mobileColumns = 1"
                        class="p-1.5 px-3 rounded-md text-xs font-bold transition-all flex items-center gap-1.5"
                        :class="mobileColumns === 1 ? 'bg-white dark:bg-gray-700 shadow-sm text-orange-600' : 'text-gray-400'"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="7" height="7" x="3" y="3" rx="1"/><rect width="7" height="7" x="14" y="3" rx="1"/><rect width="7" height="7" x="14" y="14" rx="1"/><rect width="7" height="7" x="3" y="14" rx="1"/></svg>
                    </button>
                    <button
                        @click="mobileColumns = 2"
                        class="p-1.5 px-3 rounded-md text-xs font-bold transition-all flex items-center gap-1.5"
                        :class="mobileColumns === 2 ? 'bg-white dark:bg-gray-700 shadow-sm text-orange-600' : 'text-gray-400'"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="18" height="18" x="3" y="3" rx="2"/><path d="M3 9h18"/><path d="M3 15h18"/><path d="M9 3v18"/><path d="M15 3v18"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <template x-if="filteredItems.length > 0">
        <div
            class="grid gap-4 md:gap-6 transition-all duration-500 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4"
            :class="mobileColumns === 1 ? 'grid-cols-1' : 'grid-cols-2'"
        >
            <template x-for="(item, index) in filteredItems" :key="item.id">
                <div
                    class="relative group rounded-2xl overflow-hidden cursor-pointer aspect-square bg-gray-100 dark:bg-gray-800 shadow-sm hover:shadow-xl transition-all duration-300"
                    @click="selectedIndex = index"
                >
                    <img
                        :src="item.image_url"
                        :alt="item.title"
                        loading="lazy"
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                    />

                    <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="absolute bottom-0 left-0 right-0 p-4 bg-gradient-to-t from-black/90 via-black/50 to-transparent translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                        <p class="text-white text-sm font-bold truncate" x-text="item.title"></p>
                        <p class="text-white/70 text-[10px] uppercase tracking-wider mt-0.5 opacity-0 group-hover:opacity-100 transition-opacity delay-75">Lihat Foto</p>
                    </div>
                </div>
            </template>
        </div>
    </template>

    <template x-if="filteredItems.length === 0">
        <div class="flex flex-col items-center justify-center py-20 text-center animate-in fade-in zoom-in duration-300">
            <div class="w-16 h-16 bg-gray-100 dark:bg-gray-800 rounded-full flex items-center justify-center mb-4 text-gray-400">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
            </div>
            <h3 class="text-lg font-bold text-gray-900 dark:text-white">Tidak ditemukan</h3>
            <p class="text-gray-500">Coba kata kunci lain untuk "<span x-text="searchQuery"></span>"</p>
            <button
                @click="searchQuery = ''"
                class="mt-6 text-orange-600 font-semibold hover:underline"
            >
                Hapus Pencarian
            </button>
        </div>
    </template>

    <div class="pt-12 border-t border-gray-100 dark:border-gray-800 flex justify-center">
        <a
            href="/"
            class="group inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gray-100 dark:bg-gray-800 hover:bg-orange-500 hover:text-white text-gray-600 dark:text-gray-300 font-medium transition-all duration-300"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:-translate-x-1 transition-transform"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
            <span>Kembali ke Beranda</span>
        </a>
    </div>

    <template x-if="activeImage">
        <div
            class="fixed inset-0 z-[9999] flex items-center justify-center bg-black/95 backdrop-blur-sm animate-in fade-in duration-300"
            @click="close()"
        >
            <div
                class="relative w-full h-full flex items-center justify-center p-0 md:p-8"
                @click.stop
                @touchstart="handleTouchStart"
                @touchmove="handleTouchMove"
                @touchend="handleTouchEnd"
            >
                <img
                    :src="activeImage.image_url"
                    :alt="activeImage.title"
                    class="w-full h-auto max-h-[80vh] md:max-h-[85vh] object-contain md:rounded-sm shadow-2xl"
                />
            </div>

            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black via-black/80 to-transparent pt-24 pb-8 px-6 md:px-12 pointer-events-none">
                <div class="container mx-auto max-w-6xl flex flex-col md:flex-row justify-between items-end gap-4">
                    <div class="text-left space-y-2 pointer-events-auto">
                        <h3 class="text-xl md:text-3xl font-bold text-white" x-text="activeImage.title"></h3>
                        <p class="text-gray-300 text-sm md:text-base max-w-2xl line-clamp-2 md:line-clamp-none" x-text="activeImage.description"></p>
                    </div>
                    <div class="text-white font-mono text-sm md:text-lg tracking-widest opacity-80 whitespace-nowrap">
                        <span x-text="selectedIndex + 1"></span> / <span x-text="filteredItems.length"></span>
                    </div>
                </div>
            </div>

            <button @click.stop="prev()" class="absolute left-2 md:left-4 top-1/2 -translate-y-1/2 p-3 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all border border-white/10 active:scale-95 md:hover:scale-110 z-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
            </button>

            <button @click.stop="next()" class="absolute right-2 md:right-4 top-1/2 -translate-y-1/2 p-3 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all border border-white/10 active:scale-95 md:hover:scale-110 z-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
            </button>

            <button @click="close()" class="absolute top-4 right-4 md:top-6 md:right-6 p-2 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all border border-white/10 group z-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="group-hover:rotate-90 transition-transform"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
            </button>
        </div>
    </template>

</div>

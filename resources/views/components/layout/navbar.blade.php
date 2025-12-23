@props(['site' => null])

@php
    $navItems = [
        ['label' => 'Beranda', 'href' => '/#home'],
        ['label' => 'Tentang', 'href' => '/#about'],
        ['label' => 'Galeri', 'href' => '/#gallery'],
        ['label' => 'Aktivitas', 'href' => '/#activities'],
        ['label' => 'Fasilitas', 'href' => '/#facilities'],
        ['label' => 'Organisasi', 'href' => '/organization'],
        ['label' => 'Kontak', 'href' => '/#contact'],
    ];

    $isHomePage = request()->is('/');
@endphp

<nav
    x-data="{
        isScrolled: false,
        isOpen: false,
        darkMode: localStorage.getItem('theme') === 'dark',

        get isSolid() {
            return {{ $isHomePage ? 'false' : 'true' }} || this.isScrolled || this.isOpen;
        },

        toggleTheme() {
            this.darkMode = !this.darkMode;
            localStorage.setItem('theme', this.darkMode ? 'dark' : 'light');
            if (this.darkMode) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        },

        init() {
            this.isScrolled = window.scrollY > 20;

            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                this.darkMode = true;
                document.documentElement.classList.add('dark');
            } else {
                this.darkMode = false;
                document.documentElement.classList.remove('dark');
            }

            this.$watch('isOpen', value => {
                document.body.style.overflow = value ? 'hidden' : '';
            });
        }
    }"
    @scroll.window="isScrolled = (window.scrollY > 20)"
    :class="isSolid
        ? 'bg-white/95 dark:bg-gray-950/95 backdrop-blur-md shadow-sm border-b border-gray-200/50 dark:border-gray-800/50 py-3'
        : 'bg-transparent py-6'"
    class="fixed top-0 inset-x-0 z-50 overflow-x-hidden transition-all duration-300"
>
    <div class="container mx-auto px-4 md:px-8">
        <div class="flex items-center justify-between">

            <a href="/" class="flex items-center gap-3 group min-w-0">
                <div
                    class="relative flex-shrink-0 flex items-center justify-center transition-all duration-300"
                    :class="isScrolled ? 'w-10 h-10' : 'w-12 h-12 md:w-14 md:h-14'"
                >
                    @if(isset($site['logo_url']) && $site['logo_url'])
                        <img
                            src="{{ $site['logo_url'] }}"
                            alt="logo"
                            class="w-full h-full object-contain drop-shadow-sm"
                        >
                    @else
                        <div
                            class="w-full h-full rounded-full border-2"
                            :class="isSolid ? 'border-gray-200' : 'border-white/30'"
                        ></div>
                    @endif
                </div>

                <span
                    class="hidden md:block font-bold transition-all duration-300 truncate"
                    :class="[
                        isScrolled ? 'text-lg' : 'text-xl',
                        isSolid ? 'text-gray-900 dark:text-gray-100' : 'text-white drop-shadow-md'
                    ]"
                >
                    {{ $site['site_name'] ?? "Pura Agung Kertajaya" }}
                </span>
            </a>

            <div class="hidden lg:flex items-center gap-8">
                @foreach($navItems as $item)
                    <a
                        href="{{ $item['href'] }}"
                        class="text-sm font-bold tracking-wide transition-colors relative group py-2 hover:opacity-80"
                        :class="isSolid ? 'text-gray-900 dark:text-gray-100' : 'text-white drop-shadow-md'"
                    >
                        {{ $item['label'] }}
                        <span
                            class="absolute bottom-0 left-0 w-0 h-0.5 transition-all duration-300 group-hover:w-full"
                            :class="isSolid ? 'bg-orange-600' : 'bg-white'"
                        ></span>
                    </a>
                @endforeach
            </div>

            <div class="flex items-center gap-4 flex-shrink-0">

                <button
                    @click="toggleTheme()"
                    class="p-2 rounded-full transition-all"
                    :class="isSolid
                        ? 'hover:bg-gray-100 dark:hover:bg-gray-800 text-gray-700 dark:text-gray-200'
                        : 'hover:bg-white/20 text-white'"
                    aria-label="Toggle theme"
                >
                    <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-sun"><circle cx="12" cy="12" r="4"/><path d="M12 2v2"/><path d="M12 20v2"/><path d="m4.93 4.93 1.41 1.41"/><path d="m17.66 17.66 1.41 1.41"/><path d="M2 12h2"/><path d="M20 12h2"/><path d="m6.34 17.66-1.41 1.41"/><path d="m19.07 4.93-1.41 1.41"/></svg>

                    <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-moon"><path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"/></svg>
                </button>

                <button
                    @click="isOpen = !isOpen"
                    class="lg:hidden p-2 rounded-lg transition-all"
                    :class="isSolid ? 'text-gray-900 dark:text-gray-100' : 'text-white'"
                    aria-label="Toggle mobile menu"
                >
                    <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-menu"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>

                    <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>

        <div
            x-show="isOpen"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-5"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-5"
            class="lg:hidden mt-4 pb-4 border-t border-gray-100 dark:border-gray-800"
            style="display: none;"
        >
            <div class="flex flex-col space-y-2 pt-4">
                @foreach($navItems as $item)
                    <a
                        href="{{ $item['href'] }}"
                        @click="isOpen = false"
                        class="block px-4 py-3 text-sm font-medium rounded-xl text-gray-700 dark:text-gray-200 hover:bg-orange-50 dark:hover:bg-gray-800 hover:text-orange-600 transition-colors"
                    >
                        {{ $item['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>

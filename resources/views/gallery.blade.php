<x-layout :site="$siteIdentity" :contact="$contactData">

    <section class="min-h-screen bg-white dark:bg-gray-950 pt-32 pb-20 overflow-x-hidden">
        <div class="container mx-auto px-6 md:px-12">

            <div class="text-center max-w-4xl mx-auto mb-16 space-y-6">

                <div class="flex items-center justify-center gap-4" data-aos="fade-up">
                    <div class="h-[2px] w-8 md:w-12 bg-orange-500/60"></div>
                    <span class="text-orange-600 dark:text-orange-400 text-xs md:text-sm font-bold tracking-[0.3em] uppercase">
                        Dokumentasi
                    </span>
                    <div class="h-[2px] w-8 md:w-12 bg-orange-500/60"></div>
                </div>

                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 dark:text-white tracking-tight leading-tight" data-aos="fade-up" data-aos-delay="100">
                    Galeri <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-500">Kegiatan</span>
                </h1>

                <p class="text-gray-600 dark:text-gray-400 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    Menyimpan kenangan indah dari setiap momen kebersamaan dan kegiatan spiritual umat.
                </p>
            </div>

            <x-gallery.gallery-grid :items="$galleryData" />

        </div>
    </section>

</x-layout>

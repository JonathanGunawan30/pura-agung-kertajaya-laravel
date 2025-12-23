@php
    $paragraphs = [];
    if (!empty($aboutData['description'])) {
        $paragraphs = array_filter(explode("\n", $aboutData['description']), function($p) {
            return trim($p) !== '';
        });
    }
@endphp

<x-layout :site="$siteIdentity" :contact="$contactData">

    <section class="pt-32 pb-20 bg-white dark:bg-gray-950 overflow-hidden min-h-screen">
        <div class="container mx-auto px-6 md:px-12">

            <div class="text-center max-w-4xl mx-auto mb-12 space-y-6">

                <div class="flex items-center justify-center gap-4" data-aos="fade-up">
                    <div class="h-[2px] w-8 md:w-12 bg-orange-500/60"></div>
                    <span class="text-orange-600 dark:text-orange-400 text-xs md:text-sm font-bold tracking-[0.3em] uppercase">
                        Profil Lengkap
                    </span>
                    <div class="h-[2px] w-8 md:w-12 bg-orange-500/60"></div>
                </div>

                <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 dark:text-white tracking-tight leading-tight" data-aos="fade-up" data-aos-delay="100">
                    Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-600 to-orange-500">Pura</span>
                </h1>

                <p class="text-gray-600 dark:text-gray-400 text-lg md:text-xl leading-relaxed max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="200">
                    Menelusuri jejak sejarah, nilai spiritual, dan dedikasi pelayanan umat di Pura Agung Kertajaya.
                </p>
            </div>

            @if(isset($aboutData['image_url']))
                <div class="w-full flex justify-center mb-16" data-aos="zoom-in" data-aos-duration="1000">
                    <div class="w-full max-w-5xl h-[40vh] md:h-[60vh] rounded-3xl overflow-hidden shadow-2xl border-4 border-white dark:border-gray-800">
                        <img
                            loading="lazy"
                            src="{{ $aboutData['image_url'] }}"
                            alt="Pura Agung Kertajaya"
                            class="w-full h-full object-cover object-center transform hover:scale-105 transition-transform duration-700"
                        />
                    </div>
                </div>
            @endif

            <article class="max-w-4xl mx-auto text-gray-700 dark:text-gray-300 leading-relaxed space-y-8 text-lg md:text-xl text-justify mb-20">
                @foreach($paragraphs as $index => $paragraph)
                    <p
                        data-aos="fade-up"
                        data-aos-delay="{{ 100 + ($index * 50) }}"
                    >
                        {{ $paragraph }}
                    </p>
                @endforeach
            </article>

            <div class="flex justify-center pt-8 border-t border-gray-100 dark:border-gray-800" data-aos="fade-up">
                <a
                    href="/"
                    class="group inline-flex items-center gap-2 px-6 py-3 rounded-full bg-gray-100 dark:bg-gray-800 hover:bg-orange-500 hover:text-white text-gray-600 dark:text-gray-300 font-medium transition-all duration-300 shadow-sm hover:shadow-lg hover:shadow-orange-500/20"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 group-hover:-translate-x-1 transition-transform"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>

                    <span>Kembali ke Beranda</span>
                </a>
            </div>

        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800,
                once: true,
            });
        });
    </script>

</x-layout>

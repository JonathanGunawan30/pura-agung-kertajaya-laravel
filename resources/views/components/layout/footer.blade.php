@props(['site' => null, 'contact' => null])

@php
    $exploreLinks = [
        ['name' => 'Beranda', 'href' => '/'],
        ['name' => 'Tentang Kami', 'href' => '/#about'],
        ['name' => 'Galeri Kegiatan', 'href' => '/#gallery'],
        ['name' => 'Agenda & Jadwal', 'href' => '/#activities'],
        ['name' => 'Fasilitas Pura', 'href' => '/#facilities'],
    ];

    $infoLinks = [
        ['name' => 'Struktur Organisasi', 'href' => '/organization'],
        ['name' => 'Hubungi Kami', 'href' => '/#contact'],
        ['name' => 'Kebijakan Privasi', 'href' => '/privacy'],
        ['name' => 'Syarat & Ketentuan', 'href' => '/terms'],
    ];
@endphp

<footer class="bg-white dark:bg-gray-950 pt-20 pb-10 border-t border-gray-200 dark:border-gray-800 transition-colors duration-300">
    <div class="container mx-auto px-6 md:px-12">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">

            <div class="space-y-6">
                <div>
                    <h3 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $site['site_name'] ?? "Pura Agung Kertajaya" }}
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 text-sm mt-4 leading-relaxed">
                        {{ $site['tagline'] ?? "Tempat suci umat Hindu di Tangerang yang menjadi pusat kegiatan spiritual, pelestarian budaya, dan kebersamaan umat yang harmonis." }}
                    </p>
                </div>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 flex items-center gap-2 text-gray-900 dark:text-white">
                    <span class="w-8 h-[2px] bg-orange-600"></span> Jelajahi
                </h4>
                <ul class="space-y-3">
                    @foreach($exploreLinks as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="text-gray-500 dark:text-gray-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors flex items-center gap-2 group text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3 opacity-0 -ml-3 group-hover:opacity-100 group-hover:ml-0 transition-all duration-300 text-orange-600"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>

                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 flex items-center gap-2 text-gray-900 dark:text-white">
                    <span class="w-8 h-[2px] bg-orange-600"></span> Informasi
                </h4>
                <ul class="space-y-3">
                    @foreach($infoLinks as $link)
                        <li>
                            <a href="{{ $link['href'] }}" class="text-gray-500 dark:text-gray-400 hover:text-orange-600 dark:hover:text-orange-500 transition-colors text-sm">
                                {{ $link['name'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h4 class="text-lg font-bold mb-6 flex items-center gap-2 text-gray-900 dark:text-white">
                    <span class="w-8 h-[2px] bg-orange-600"></span> Kontak
                </h4>
                <div class="space-y-4">
                    @if($contact)
                        <div class="flex items-start gap-3 text-gray-500 dark:text-gray-400 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-orange-600 shrink-0 mt-0.5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            <span class="leading-relaxed">{{ $contact['address'] ?? '-' }}</span>
                        </div>

                        <div class="flex items-center gap-3 text-gray-500 dark:text-gray-400 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-orange-600 shrink-0"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            <span>{{ $contact['phone'] ?? '-' }}</span>
                        </div>

                        <div class="flex items-center gap-3 text-gray-500 dark:text-gray-400 text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-orange-600 shrink-0"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            <span class="break-all">{{ $contact['email'] ?? '-' }}</span>
                        </div>
                    @else
                        <p class="text-gray-500 text-sm italic">Memuat informasi kontak...</p>
                    @endif
                </div>
            </div>

        </div>

        <div class="border-t border-gray-100 dark:border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-gray-400 dark:text-gray-500">
            <p>&copy; {{ date('Y') }} {{ $site['site_name'] ?? "Pura Agung Kertajaya" }}. All rights reserved.</p>
            <p>Designed & Developed with <span class="text-red-500">❤</span> for the Community.</p>
        </div>
    </div>
</footer>

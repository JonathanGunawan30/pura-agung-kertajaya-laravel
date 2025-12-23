<x-layout :site="$siteIdentity" :contact="$contactData">

    @php
        $email = $contactData['email'] ?? 'info@puraagungkertajaya.com';
        $lastUpdated = "10 Desember 2025";
    @endphp

    <section class="min-h-screen py-24 bg-gray-50 dark:bg-gray-950">
        <div class="container mx-auto px-6 md:px-12 max-w-4xl">

            <div class="text-center mb-16">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-600"><path d="M14.5 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7.5L14.5 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" x2="8" y1="13" y2="13"/><line x1="16" x2="8" y1="17" y2="17"/><line x1="10" x2="8" y1="9" y2="9"/></svg>
                </div>
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Ketentuan Layanan
                </h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    Terakhir Diperbarui: <span class="font-medium text-orange-600">{{ $lastUpdated }}</span>
                </p>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 md:p-12 shadow-xl shadow-gray-200/50 dark:shadow-none border border-gray-100 dark:border-gray-800">

                <div class="space-y-12">
                    <div class="prose dark:prose-invert max-w-none">
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
                            Selamat datang di website <strong>Pura Agung Kertajaya</strong>.
                            Halaman ini menjelaskan aturan dasar penggunaan website kami. Dengan mengakses dan menggunakan situs ini,
                            Anda dianggap telah membaca, memahami, dan menyetujui ketentuan yang berlaku di bawah ini.
                        </p>
                    </div>

                    <hr class="border-gray-100 dark:border-gray-800" />

                    <div class="flex gap-6">
                        <div class="shrink-0 hidden md:block">
                            <div class="w-12 h-12 rounded-2xl bg-orange-50 dark:bg-orange-900/20 flex items-center justify-center text-orange-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-3">
                                <span class="md:hidden text-orange-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                </span>
                                Tujuan Penggunaan
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                Website ini bertujuan untuk menyediakan informasi umum mengenai kegiatan keagamaan, fasilitas, struktur organisasi, dan profil Pura Agung Kertajaya.
                                Anda setuju untuk menggunakan informasi ini hanya untuk tujuan yang sah dan tidak melanggar hukum, serta tidak merusak reputasi Pura maupun komunitas umat.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="shrink-0 hidden md:block">
                            <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-3">
                                <span class="md:hidden text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                </span>
                                Keakuratan Informasi & Jadwal
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                Kami berupaya semaksimal mungkin untuk menampilkan informasi yang tepat dan terbaru. Namun, harap dicatat bahwa:
                            </p>
                            <ul class="mt-4 space-y-2 list-disc list-inside text-gray-600 dark:text-gray-400 ml-1">
                                <li>Jadwal kegiatan atau acara dapat berubah sewaktu-waktu tergantung situasi di lapangan.</li>
                                <li>Informasi kontak pengurus mungkin mengalami pembaruan.</li>
                            </ul>
                            <p class="mt-3 text-gray-600 dark:text-gray-400 text-sm italic">
                                *Kami menyarankan Anda menghubungi pengurus melalui kontak yang tersedia jika memerlukan konfirmasi mendesak.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="shrink-0 hidden md:block">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50 dark:bg-purple-900/20 flex items-center justify-center text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M14.83 14.83a4 4 0 1 1 0-5.66"/></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-3">
                                <span class="md:hidden text-purple-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M14.83 14.83a4 4 0 1 1 0-5.66"/></svg>
                                </span>
                                Hak Cipta & Konten
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                Seluruh aset digital dalam website ini, termasuk namun tidak terbatas pada teks, logo, dan foto dokumentasi kegiatan,
                                adalah milik Pura Agung Kertajaya atau digunakan dengan izin.
                            </p>
                            <p class="mt-3 text-gray-600 dark:text-gray-400">
                                Dilarang keras menyalin, memodifikasi, atau mendistribusikan ulang konten website ini untuk tujuan komersial tanpa izin tertulis dari pengurus.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="shrink-0 hidden md:block">
                            <div class="w-12 h-12 rounded-2xl bg-red-50 dark:bg-red-900/20 flex items-center justify-center text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-3">
                                <span class="md:hidden text-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/><line x1="12" x2="12" y1="8" y2="12"/><line x1="12" x2="12.01" y1="16" y2="16"/></svg>
                                </span>
                                Batasan Tanggung Jawab
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                Pengurus Pura Agung Kertajaya tidak bertanggung jawab atas kerugian langsung maupun tidak langsung yang timbul akibat:
                            </p>
                            <ul class="mt-4 space-y-2 text-gray-600 dark:text-gray-400 text-sm bg-gray-50 dark:bg-gray-800 p-4 rounded-xl">
                                <li class="flex items-center gap-2">Gangguan teknis yang menyebabkan website tidak dapat diakses.</li>
                                <li class="flex items-center gap-2">Kesalahan interpretasi pengguna terhadap informasi yang disajikan.</li>
                                <li class="flex items-center gap-2">Tautan ke situs pihak ketiga (seperti Google Maps) yang berada di luar kendali kami.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="shrink-0 hidden md:block">
                            <div class="w-12 h-12 rounded-2xl bg-green-50 dark:bg-green-900/20 flex items-center justify-center text-green-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-3">
                                <span class="md:hidden text-green-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M8 16H3v5"/></svg>
                                </span>
                                Perubahan Ketentuan
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                Ketentuan layanan ini dapat kami perbarui sewaktu-waktu tanpa pemberitahuan sebelumnya.
                                Anda disarankan untuk memeriksa halaman ini secara berkala untuk mengetahui perubahan terbaru.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="mt-12 pt-8 border-t border-gray-100 dark:border-gray-800">
                    <p class="text-gray-500 dark:text-gray-400 text-center text-sm">
                        Jika Anda memerlukan klarifikasi mengenai ketentuan ini, silakan hubungi kami via email: <br class="md:hidden" />
                        <a href="mailto:{{ $email }}" class="text-orange-600 hover:text-orange-700 font-medium ml-1 inline-flex items-center gap-1 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                            {{ $email }}
                        </a>
                    </p>
                </div>

            </div>
        </div>
    </section>

</x-layout>

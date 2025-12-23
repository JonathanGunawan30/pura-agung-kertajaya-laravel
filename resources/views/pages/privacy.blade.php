<x-layout :site="$siteIdentity" :contact="$contactData">

    @php
        $email = $contactData['email'] ?? 'info@puraagungkertajaya.com';
        $lastUpdated = "10 Desember 2025";
    @endphp

    <section class="min-h-screen py-24 bg-gray-50 dark:bg-gray-950">
        <div class="container mx-auto px-6 md:px-12 max-w-4xl">

            <div class="text-center mb-16">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-600"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"/></svg>
                </div>
                <h1 class="text-3xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Kebijakan Privasi
                </h1>
                <p class="text-gray-500 dark:text-gray-400 text-sm">
                    Terakhir Diperbarui: <span class="font-medium text-orange-600">{{ $lastUpdated }}</span>
                </p>
            </div>

            <div class="bg-white dark:bg-gray-900 rounded-3xl p-8 md:p-12 shadow-xl shadow-gray-200/50 dark:shadow-none border border-gray-100 dark:border-gray-800">

                <div class="space-y-12">

                    <div class="prose dark:prose-invert max-w-none">
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed text-lg">
                            Selamat datang di website resmi <strong>Pura Agung Kertajaya</strong>.
                            Kami menghargai privasi Anda dan berkomitmen untuk transparan mengenai bagaimana informasi dikelola dalam website ini.
                            Secara umum, website ini bersifat informatif dan <strong>tidak mengumpulkan data pribadi</strong> pengunjung secara aktif (seperti pendaftaran akun atau formulir online).
                        </p>
                    </div>

                    <hr class="border-gray-100 dark:border-gray-800" />

                    <div class="flex gap-6">
                        <div class="shrink-0 hidden md:block">
                            <div class="w-12 h-12 rounded-2xl bg-orange-50 dark:bg-orange-900/20 flex items-center justify-center text-orange-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-3">
                                <span class="md:hidden text-orange-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                </span>
                                Informasi & Data Testimonial
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                Website ini menampilkan informasi umum mengenai kegiatan, fasilitas, serta dokumentasi visual Pura.
                                Terkait data pribadi, satu-satunya bagian yang memuat informasi personal adalah halaman <strong>Kata Mereka (Testimonial)</strong>.
                            </p>
                            <ul class="mt-4 space-y-2 list-disc list-inside text-gray-600 dark:text-gray-400 ml-1">
                                <li>Data berupa nama, foto profil, dan komentar bersumber dari <strong>ulasan publik Google Maps</strong>.</li>
                                <li>Informasi tersebut disalin secara manual dan disimpan di database internal hanya untuk keperluan tampilan website.</li>
                                <li>Kami tidak memproses data tersebut untuk keperluan pemasaran atau pihak ketiga lainnya.</li>
                            </ul>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="shrink-0 hidden md:block">
                            <div class="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-900/20 flex items-center justify-center text-blue-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="8" x="2" y="2" rx="2" ry="2"/><rect width="20" height="8" x="2" y="14" rx="2" ry="2"/><line x1="6" x2="6.01" y1="6" y2="6"/><line x1="6" x2="6.01" y1="18" y2="18"/></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-3">
                                <span class="md:hidden text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="8" x="2" y="2" rx="2" ry="2"/><rect width="20" height="8" x="2" y="14" rx="2" ry="2"/><line x1="6" x2="6.01" y1="6" y2="6"/><line x1="6" x2="6.01" y1="18" y2="18"/></svg>
                                </span>
                                Log Data Teknis
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                Seperti kebanyakan website, penyedia layanan hosting kami mungkin mencatat data teknis standar secara otomatis (server logs) yang bersifat non-pribadi, meliputi:
                            </p>
                            <ul class="mt-4 space-y-2 text-gray-600 dark:text-gray-400 text-sm bg-gray-50 dark:bg-gray-800 p-4 rounded-xl">
                                <li class="flex items-center gap-2">Alamat Protokol Internet (IP Address)</li>
                                <li class="flex items-center gap-2">Tipe Browser dan Perangkat</li>
                                <li class="flex items-center gap-2">Halaman yang dikunjungi dan waktu akses</li>
                            </ul>
                            <p class="mt-4 text-gray-600 dark:text-gray-400 text-sm">
                                Data ini digunakan semata-mata untuk analisis keamanan dan stabilitas website.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-6">
                        <div class="shrink-0 hidden md:block">
                            <div class="w-12 h-12 rounded-2xl bg-purple-50 dark:bg-purple-900/20 flex items-center justify-center text-purple-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 flex items-center gap-3">
                                <span class="md:hidden text-purple-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/></svg>
                                </span>
                                Tautan Pihak Ketiga
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                Website ini memuat tautan atau embed dari layanan eksternal, khususnya <strong>Google Maps</strong>.
                                Harap diperhatikan bahwa kami tidak memiliki kendali atas kebijakan privasi atau konten situs pihak ketiga tersebut.
                                Kami menyarankan Anda untuk meninjau kebijakan privasi masing-masing layanan.
                            </p>
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
                                Pembaruan Kebijakan
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                                Kebijakan privasi ini dapat kami perbarui sewaktu-waktu untuk mencerminkan perubahan operasional atau hukum.
                                Setiap perubahan akan ditandai dengan tanggal "Terakhir Diperbarui" di bagian atas halaman ini.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="mt-12 pt-8 border-t border-gray-100 dark:border-gray-800">
                    <p class="text-gray-500 dark:text-gray-400 text-center text-sm">
                        Jika Anda memiliki pertanyaan mengenai kebijakan ini, silakan hubungi kami melalui email: <br class="md:hidden" />
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

<x-layout :site="$siteIdentity" :contact="$contactData">

    <section class="min-h-screen py-32 bg-gray-50 dark:bg-gray-950">
        <div class="container mx-auto px-6 md:px-12">

            <div class="text-center mb-20 space-y-4" data-aos="fade-up">
                <div class="flex items-center justify-center gap-4">
                    <div class="h-[2px] w-12 bg-orange-600"></div>
                    <span class="text-orange-600 dark:text-orange-600 text-sm font-bold tracking-[0.2em] uppercase">
                        Struktur Organisasi
                    </span>
                    <div class="h-[2px] w-12 bg-orange-600"></div>
                </div>
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white leading-tight">
                    Banjar Pura Agung <span class="text-orange-600">Kertajaya</span>
                </h1>
            </div>

            <div class="max-w-5xl mx-auto space-y-12">
                @foreach($groupedData as $order => $groupMembers)
                    @php
                        $fullPosition = $groupMembers[0]['position'];
                        $mainTitleParts = explode(' - ', $fullPosition);
                        $mainTitle = $mainTitleParts[0];

                        $subGroups = [];
                        foreach ($groupMembers as $member) {
                            $parts = explode(' - ', $member['position']);
                            $subTitle = isset($parts[1]) ? trim($parts[1]) : 'Pengurus';

                            if (!isset($subGroups[$subTitle])) {
                                $subGroups[$subTitle] = [];
                            }
                            $subGroups[$subTitle][] = $member;
                        }
                    @endphp

                    <div class="relative group">
                        @if(!$loop->first)
                            <div class="absolute -top-12 left-8 md:left-[2.25rem] w-[2px] h-12 border-l-2 border-dashed border-gray-300 dark:border-gray-700 -z-10"></div>
                        @endif

                        <div
                            class="bg-white dark:bg-gray-800 rounded-3xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden hover:shadow-xl hover:border-orange-200 dark:hover:border-orange-900 transition-all duration-500"
                            data-aos="fade-up"
                            data-aos-delay="{{ $loop->index * 50 }}"
                        >
                            <div class="p-6 md:p-8 border-b border-gray-100 dark:border-gray-700 flex items-center gap-6 bg-gray-50/50 dark:bg-gray-800/50">
                                <div class="shrink-0 w-12 h-12 md:w-14 md:h-14 rounded-2xl bg-orange-600 flex items-center justify-center text-white text-xl font-bold shadow-lg shadow-orange-600/20">
                                    {{ $order }}
                                </div>
                                <h2 class="text-xl md:text-2xl font-bold text-gray-900 dark:text-white uppercase tracking-wide">
                                    {{ $mainTitle }}
                                </h2>
                            </div>

                            <div class="p-6 md:p-8">
                                <div class="grid gap-8 {{ count($subGroups) === 1 ? 'grid-cols-1' : 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3' }}">
                                    @foreach($subGroups as $subTitle => $members)
                                        <div class="space-y-4">
                                            @if($subTitle !== 'Pengurus' || count($subGroups) > 1)
                                                <h3 class="text-sm font-bold text-gray-400 uppercase tracking-widest border-l-4 border-orange-400 pl-3">
                                                    {{ $subTitle }}
                                                </h3>
                                            @endif

                                            <ul class="space-y-3">
                                                @foreach($members as $person)
                                                    <li class="flex items-start gap-3 group/member">
                                                        <div class="mt-1 shrink-0 p-1.5 rounded-full bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 group-hover/member:bg-orange-100 group-hover/member:text-orange-600 transition-colors">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                                        </div>
                                                        <div>
                                                            <p class="text-gray-700 dark:text-gray-200 font-medium text-base leading-snug group-hover/member:text-orange-600 transition-colors">
                                                                {{ $person['name'] }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        @if(!$loop->last)
                            <div class="flex justify-center -mb-6 relative z-10">
                                <div class="w-8 h-8 bg-white dark:bg-gray-900 rounded-full border border-gray-200 dark:border-gray-700 flex items-center justify-center text-orange-500 shadow-sm mt-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                                </div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>

            <div class="mt-16 text-center" data-aos="fade-up">
                <p class="text-sm text-gray-400">
                    Total {{ count($orgData ?? []) }} Pengurus & Anggota
                </p>
            </div>

        </div>
    </section>

</x-layout>

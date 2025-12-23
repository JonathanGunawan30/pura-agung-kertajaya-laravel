<div
    x-data="{
        shareStatus: 'idle',

        async handleShare() {
            const activity = this.selectedActivity;
            const text = `*${activity.title}*\n\n📅 Waktu: ${activity.time_info}\n📍 Lokasi: ${activity.location}\n\n${activity.description}`;

            const shareData = {
                title: `Agenda Pura: ${activity.title}`,
                text: text
            };

            if (navigator.share) {
                try {
                    await navigator.share(shareData);
                    return;
                } catch (err) {
                    this.shareStatus = 'idle';
                    return;
                }
            }

            try {
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    await navigator.clipboard.writeText(text);
                } else {
                    const textArea = document.createElement('textarea');
                    textArea.value = text;
                    textArea.style.position = 'fixed';
                    textArea.style.left = '-9999px';
                    document.body.appendChild(textArea);
                    textArea.focus();
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);
                }

                this.shareStatus = 'copied';
                setTimeout(() => this.shareStatus = 'idle', 2000);
            } catch (err) {
                console.error('Gagal menyalin', err);
                this.shareStatus = 'error';
                setTimeout(() => this.shareStatus = 'idle', 3000);
            }
        }
    }"
    class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-black/60 backdrop-blur-sm animate-in fade-in duration-300"
    @click="closeModal()"
>
    <div
        class="bg-white dark:bg-gray-900 w-full max-w-lg rounded-2xl shadow-2xl relative animate-in zoom-in-95 duration-300 flex flex-col max-h-[85vh] overflow-hidden"
        @click.stop
    >
        <div class="flex items-center justify-between p-6 border-b border-gray-100 dark:border-gray-800 bg-white dark:bg-gray-900 shrink-0">
            <div class="flex items-center gap-3 text-orange-600">
                <div class="p-2 bg-orange-50 dark:bg-orange-900/20 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                </div>
                <span class="text-xs font-bold uppercase tracking-widest text-gray-400">Detail Acara</span>
            </div>

            <div class="flex items-center gap-2">
                <button
                    @click="handleShare()"
                    :disabled="shareStatus !== 'idle'"
                    class="flex items-center gap-2 px-3 py-2 rounded-full text-sm font-medium transition-all duration-300"
                    :class="{
                        'bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700': shareStatus === 'idle',
                        'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 scale-105': shareStatus === 'copied',
                        'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400 scale-105': shareStatus === 'error'
                    }"
                >
                    <svg x-show="shareStatus === 'idle'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><polyline points="16 6 12 2 8 6"/><line x1="12" x2="12" y1="2" y2="15"/></svg>

                    <svg x-show="shareStatus === 'copied'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>

                    <svg x-show="shareStatus === 'error'" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m15 9-6 6"/><path d="m9 9 6 6"/></svg>

                    <span x-text="shareStatus === 'idle' ? 'Share' : (shareStatus === 'copied' ? 'Disalin' : 'Gagal')"></span>
                </button>

                <button
                    @click="closeModal()"
                    class="p-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 rounded-full text-gray-500 transition-colors"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                </button>
            </div>
        </div>

        <div class="p-6 md:p-8 overflow-y-auto flex-1">
            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-6 leading-tight" x-text="selectedActivity.title"></h3>

            <div class="flex flex-col sm:flex-row gap-4 mb-8">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-orange-50 dark:bg-gray-800 flex items-center justify-center shrink-0 text-orange-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-wider">Waktu</p>
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-200" x-text="selectedActivity.time_info"></p>
                    </div>
                </div>

                <div class="hidden sm:block w-px bg-gray-200 dark:bg-gray-800 h-10"></div>

                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-blue-50 dark:bg-gray-800 flex items-center justify-center shrink-0 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 uppercase font-bold tracking-wider">Lokasi</p>
                        <p class="text-sm font-medium text-gray-900 dark:text-gray-200" x-text="selectedActivity.location"></p>
                    </div>
                </div>
            </div>

            <hr class="border-gray-100 dark:border-gray-800 mb-8" />

            <div
                class="prose dark:prose-invert text-gray-600 dark:text-gray-300 leading-relaxed text-base whitespace-pre-line"
                x-text="selectedActivity.description"
            ></div>
        </div>
    </div>
</div>

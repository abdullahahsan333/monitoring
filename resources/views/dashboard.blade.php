<x-layouts.app :title="__('Dashboard')">
    <div class="px-4 py-6">
        <div class="rounded-xl border border-neutral-800 bg-panel p-6 text-white shadow-sm">
            <div class="flex items-center justify-between">
                <div class="max-w-xl">
                    <h2 class="text-xl font-semibold">
                        {{ __('Congratulations John!') }}
                        <span class="ms-1">🎉</span>
                    </h2>
                    <p class="mt-2 text-neutral-300">
                        {{ __('You have done 72% more sales today.') }}<br>
                        {{ __('Check your new badge in your profile.') }}
                    </p>
                </div>
                <div class="hidden md:block">
                    <svg class="w-56 h-36 text-white" viewBox="0 0 200 120" fill="currentColor" aria-hidden="true">
                        <circle cx="160" cy="30" r="8" opacity="0.6" />
                        <rect x="115" y="50" width="60" height="40" rx="6" />
                        <rect x="35" y="40" width="70" height="50" rx="10" />
                        <circle cx="70" cy="40" r="18" />
                        <rect x="55" y="58" width="30" height="20" rx="4" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

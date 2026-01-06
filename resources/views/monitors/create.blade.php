<x-layouts.app :title="__('Create Monitor')">
    <div class="flex w-full h-full items-center justify-center p-6">
        <div class="w-full max-w-xl rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="mb-4 flex items-center justify-between">
                <flux:heading size="xl">{{ __('Create your first monitor') }}</flux:heading>
                <span class="text-xs text-neutral-600 dark:text-neutral-400">{{ __('Step 1 of 4') }}</span>
            </div>

            <div class="space-y-4">
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-neutral-800 dark:text-neutral-200">{{ __('What would you like to monitor?') }}</label>
                    <div class="rounded-lg border border-neutral-200 dark:border-neutral-700 dark:bg-neutral-800">
                        <div class="p-3">
                            <div class="text-sm font-medium text-neutral-900 dark:text-neutral-100">{{ __('HTTP / website monitoring') }}</div>
                            <div class="text-xs text-neutral-600 dark:text-neutral-400">{{ __('Use HTTP(s) monitor to monitor your website.') }}</div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 border-t border-neutral-200 p-3 dark:border-neutral-700">
                            <div class="flex items-center gap-2 rounded-md border border-neutral-200 p-2 text-sm dark:border-neutral-700 dark:bg-neutral-800">
                                <span class="shrink-0 size-4 rounded-sm bg-emerald-500"></span>
                                <span class="text-neutral-800 dark:text-neutral-200">{{ __('Keyword monitoring') }}</span>
                            </div>
                            <div class="flex items-center gap-2 rounded-md border border-neutral-200 p-2 text-sm dark:border-neutral-700 dark:bg-neutral-800">
                                <span class="shrink-0 size-4 rounded-sm bg-emerald-500"></span>
                                <span class="text-neutral-800 dark:text-neutral-200">{{ __('Ping monitoring') }}</span>
                            </div>
                            <div class="flex items-center gap-2 rounded-md border border-neutral-200 p-2 text-sm dark:border-neutral-700 dark:bg-neutral-800">
                                <span class="shrink-0 size-4 rounded-sm bg-emerald-500"></span>
                                <span class="text-neutral-800 dark:text-neutral-200">{{ __('Port monitoring') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <form class="grid gap-4" action="#" method="post">
                    @csrf
                    <flux:input
                        name="url"
                        :label="__('URL to monitor')"
                        type="text"
                        placeholder="https://example.com/"
                        required
                    />

                    <div class="flex items-center justify-between">
                        <div class="text-xs text-neutral-600 dark:text-neutral-400">
                            {{ __('You can setup monitor interval, domain and SSL monitoring, cron job monitoring and more later in monitor settings.') }}
                        </div>

                        <flux:link :href="route('monitors.notifications')" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                            {{ __('Create monitor') }}
                        </flux:link>
                    </div>
                </form>
            </div>

            <div class="mt-6 text-center">
                <flux:link :href="route('monitoring.index')" class="text-sm" wire:navigate>{{ __('Skip onboarding') }}</flux:link>
            </div>
        </div>
    </div>
</x-layouts.app>

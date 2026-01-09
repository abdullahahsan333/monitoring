<x-layouts.app :title="__('Create Monitor')">
    <flux:modal name="monitors-modal" :show="true" focusable class="max-w-xl">
        <div class="w-full rounded-xl border border-neutral-200 !bg-panel p-6 shadow-sm">
            <div class="mb-4 flex items-center justify-between">
                <flux:heading size="xl" class="!text-white">{{ __('Create your first monitor') }}</flux:heading>
                <span class="text-xs text-white">{{ __('Step 1 of 4') }}</span>
            </div>

            <div class="space-y-4">
                <div class="grid gap-2">
                    <label class="text-sm font-medium text-white">{{ __('What would you like to monitor?') }}</label>
                    <div class="rounded-lg border border-neutral-200">
                        <div class="p-3">
                            <div class="text-sm font-medium text-white">{{ __('HTTP / website monitoring') }}</div>
                            <div class="text-xs text-white">{{ __('Use HTTP(s) monitor to monitor your website.') }}</div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 border-t border-neutral-200 p-3">
                            <label class="flex items-center gap-2 rounded-md border border-neutral-200 p-2 text-sm">
                                <input type="checkbox" name="monitor_features[]" value="keyword" class="shrink-0 size-4 rounded border-neutral-600 bg-neutral-800 accent-emerald-500">
                                <span class="text-white">{{ __('Keyword monitoring') }}</span>
                            </label>
                            <label class="flex items-center gap-2 rounded-md border border-neutral-200 p-2 text-sm">
                                <input type="checkbox" name="monitor_features[]" value="ping" class="shrink-0 size-4 rounded border-neutral-600 bg-neutral-800 accent-emerald-500">
                                <span class="text-white">{{ __('Ping monitoring') }}</span>
                            </label>
                            <label class="flex items-center gap-2 rounded-md border border-neutral-200 p-2 text-sm">
                                <input type="checkbox" name="monitor_features[]" value="port" class="shrink-0 size-4 rounded border-neutral-600 bg-neutral-800 accent-emerald-500">
                                <span class="text-white">{{ __('Port monitoring') }}</span>
                            </label>
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

                    <div class="grid grid-cols-1 gap-3 text-center">
                        <div class="text-xs text-white">
                            {{ __('You can setup monitor interval, domain and SSL monitoring, cron job monitoring and more later in monitor settings.') }}
                        </div>

                        <flux:link :href="route('monitors.notifications')" class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-white hover:bg-primary-hover">
                            {{ __('Create monitor') }}
                        </flux:link>
                    </div>
                </form>
            </div>

            <div class="mt-6 text-center">
                <flux:link :href="route('monitoring.index')" class="text-sm" wire:navigate>{{ __('Skip onboarding') }}</flux:link>
            </div>
        </div>
    </flux:modal>
</x-layouts.app>

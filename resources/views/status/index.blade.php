<x-layouts.app :title="__('Status Pages')">
    <div data-force-white>
        <div class="mx-auto max-w-7xl">
            <div class="flex items-center justify-between mb-6">
                <flux:heading size="xl" class="text-main-panel-text font-semibold">
                    {{ __('Status pages.') }}
                    <span class="inline-block w-2 h-2 rounded-full bg-emerald-500 ml-1"></span>
                </flux:heading>
                <flux:link :href="route('monitors.status')" class="bg-primary hover:bg-primary-hover text-main-panel-text px-4 py-2.5 rounded-lg text-sm font-medium" wire:navigate>
                    {{ __('Create Status page') }}
                </flux:link>
            </div>

            <div class="rounded-xl border border-neutral-800 !bg-panel overflow-hidden bg-[#131a25]" data-force-white>
                <div class="bg-[#131a25] grid grid-cols-[1.6fr_1fr_1fr_160px] items-center gap-3 border border-2 border-neutral-800 px-4 py-3 text-xs text-neutral-400" data-force-white>
                <div>{{ __('Name') }}</div>
                <div>{{ __('Access level') }}</div>
                <div>{{ __('Status') }}</div>
                <div class="text-right">{{ __('Actions') }}</div>
            </div>

            <div class="grid grid-cols-[1.6fr_1fr_1fr_160px] items-center gap-3 px-4 py-3 hover:bg-neutral-800/30 transition-colors bg-[#131a25]" data-force-white>
                <div class="flex items-center gap-3">
                    <span class="inline-flex h-10 w-10 items-center justify-center rounded-full bg-emerald-500/20 text-emerald-400">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="2"/>
                            <path d="M12 2v4M12 18v4M2 12h4M18 12h4"/>
                            <path d="M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
                        </svg>
                    </span>
                    <div>
                        <div class="text-white font-semibold">{{ __('Status page') }}</div>
                        <div class="text-xs text-neutral-400">{{ __('All monitors') }}</div>
                    </div>
                </div>

                <div class="text-white flex items-center gap-2">
                    <svg class="h-5 w-5 text-neutral-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                    <span>{{ __('Public') }}</span>
                </div>

                <div class="text-white">{{ __('Published') }}</div>

                <div class="flex items-center justify-end gap-2">
                    <flux:link href="#" class="inline-flex items-center justify-center rounded-full bg-neutral-800 hover:bg-neutral-700 p-4 text-white">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                    </flux:link>

                    <flux:dropdown>
                        <flux:button variant="ghost" class="inline-flex items-center justify-center rounded-full bg-neutral-800 hover:bg-neutral-700 w-8 h-8 !px-0 !py-0 text-white">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                <circle cx="12" cy="5" r="1.5"/>
                                <circle cx="12" cy="12" r="1.5"/>
                                <circle cx="12" cy="19" r="1.5"/>
                            </svg>
                        </flux:button>
                        <flux:menu class="min-w-[220px] bg-main-panel-dropdown text-white">
                            <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Monitors') }}</flux:menu.item>
                            <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Global settings') }}</flux:menu.item>
                            <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Un-publish') }}</flux:menu.item>
                            <flux:menu.separator />
                            <flux:menu.item class="text-red-600 !bg-red-300 hover:bg-main-panel-dropdown-hover">{{ __('Delete') }}</flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

<x-layouts.app :title="__('Monitoring')">
    <div class="min-h-screen px-4 py-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_340px] gap-6">
                <!-- Main Content -->
                <div class="space-y-6">
                    <!-- Header -->
                    <div class="flex items-center justify-between">
                        <flux:heading size="xl" class="text-white">{{ __('Monitors.') }}</flux:heading>
                        <div class="flex items-center gap-2">
                    <flux:button variant="primary" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-l-lg rounded-r-none text-sm font-medium">
                        + {{ __('New') }}
                    </flux:button>
                    <flux:dropdown position="bottom" align="end">
                        <flux:button variant="primary" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-l-none rounded-r-lg">
                            <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M5 12l5-6 5 6H5z"/>
                            </svg>
                        </flux:button>
                        <flux:menu>
                            <flux:menu.item icon="document-text">{{ __('Single monitor') }}</flux:menu.item>
                            <flux:menu.item icon="sparkles">{{ __('Monitor wizard') }}</flux:menu.item>
                            <flux:menu.item icon="arrow-up-tray">{{ __('Bulk upload') }}</flux:menu.item>
                            <flux:menu.separator />
                            <flux:menu.item disabled class="flex items-center gap-2">
                                <span>{{ __('Group') }}</span>
                                <span class="ms-auto text-[10px] rounded bg-neutral-800 px-2 py-0.5 text-amber-400">{{ __('Premium') }}</span>
                            </flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>
                        </div>
                    </div>

                    <!-- Filters Bar -->
                    <div class="flex flex-wrap items-center gap-3">
                        <button class="inline-flex items-center gap-2 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-neutral-300 hover:bg-[#20253a] transition-colors">
                            <input type="checkbox" class="w-4 h-4 rounded border-neutral-600 bg-neutral-800" />
                            <span>0 / 1</span>
                        </button>
                        <button class="inline-flex items-center gap-2 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-neutral-300 hover:bg-[#20253a] transition-colors">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span>{{ __('Show groups') }}</span>
                        </button>
                        <div class="ml-auto flex items-center gap-2">
                            <div class="relative">
                                <input 
                                    type="text" 
                                    class="rounded-lg bg-[#1a1f2e] border border-neutral-700 px-4 py-2 text-sm text-neutral-200 placeholder-neutral-500 w-64 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" 
                                    placeholder="{{ __('Search by name or url') }}" 
                                />
                            </div>
                            <button class="inline-flex items-center gap-2 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-neutral-300 hover:bg-[#20253a] transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                </svg>
                                <span>{{ __('Filter') }}</span>
                            </button>
                            <button class="inline-flex items-center gap-2 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-neutral-300 hover:bg-[#20253a] transition-colors">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                </svg>
                                <span>{{ __('Down first') }}</span>
                            </button>
                        </div>
                    </div>

                    <!-- Monitor Item -->
                    <div class="group rounded-xl bg-[#1a1f2e] border border-neutral-800 p-4 hover:border-neutral-700 transition-all">
                        <div class="flex items-center gap-4">
                            <!-- Checkbox (appears on hover) -->
                            <div class="w-0 opacity-0 overflow-hidden transition-all duration-200 group-hover:w-5 group-hover:opacity-100">
                                <input type="checkbox" class="w-4 h-4 rounded border-neutral-600 bg-neutral-800 text-blue-600 focus:ring-blue-600" />
                            </div>
                            
                            <!-- Status Dot -->
                            <div class="relative shrink-0">
                                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-500">
                                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                                </span>
                            </div>
                            
                            <!-- Monitor Info -->
                            <div class="flex-1 min-w-0">
                                <div class="text-white font-medium text-base mb-1">mail.google.com/</div>
                                <div class="flex items-center gap-2 text-xs">
                                    <span class="inline-flex items-center rounded-md bg-[#252b3b] px-2 py-1 text-neutral-400 font-medium">HTTP</span>
                                    <span class="text-neutral-500">Up 1 hr, 15 min</span>
                                </div>
                            </div>
                            
                            <!-- Check Interval -->
                            <div class="hidden sm:flex items-center gap-2 text-sm text-neutral-400">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>5 min</span>
                            </div>
                            
                            <!-- Uptime Bar -->
                            <div class="hidden md:flex items-center gap-3">
                                <div class="flex gap-0.5">
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                    <span class="w-1.5 h-8 rounded-sm bg-emerald-500"></span>
                                </div>
                                <span class="text-sm text-neutral-400 font-medium w-12 text-right">100%</span>
                            </div>
                            
                            <!-- Menu -->
                            <flux:dropdown>
                                <flux:button variant="ghost" class="!px-2 !py-1 text-neutral-400 hover:text-white">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                    </svg>
                                </flux:button>
                                <flux:menu>
                                    <flux:menu.item>{{ __('Edit monitor') }}</flux:menu.item>
                                    <flux:menu.item>{{ __('Integrations & team') }}</flux:menu.item>
                                    <flux:menu.item>{{ __('Maintenance') }}</flux:menu.item>
                                    <flux:menu.item>{{ __('Add / Remove tags') }}</flux:menu.item>
                                    <flux:menu.item>{{ __('Add to status page') }}</flux:menu.item>
                                    <flux:menu.item>{{ __('Clone monitor') }}</flux:menu.item>
                                    <flux:menu.item>{{ __('Pause monitor') }}</flux:menu.item>
                                    <flux:menu.item>{{ __('Reset stats') }}</flux:menu.item>
                                    <flux:menu.separator />
                                    <flux:menu.item class="text-red-500">{{ __('Delete monitor') }}</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-4">
                    <!-- Current Status Card -->
                    <div class="rounded-xl bg-[#1a1f2e] border border-neutral-800 p-5">
                        <div class="flex items-center justify-between mb-4">
                            <flux:heading size="md" class="text-white font-semibold">{{ __('Current status.') }}</flux:heading>
                            <button class="text-neutral-500 hover:text-neutral-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </div>
                        
                        <div class="flex items-center gap-4 mb-6">
                            <div class="relative">
                                <span class="flex h-12 w-12 items-center justify-center rounded-full bg-emerald-500">
                                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                                </span>
                            </div>
                            <div class="flex-1 grid grid-cols-3 gap-4 text-center">
                                <div>
                                    <div class="text-2xl font-bold text-white mb-1">0</div>
                                    <div class="text-xs text-neutral-400">{{ __('Down') }}</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-white mb-1">1</div>
                                    <div class="text-xs text-neutral-400">{{ __('Up') }}</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-white mb-1">0</div>
                                    <div class="text-xs text-neutral-400">{{ __('Paused') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-xs text-neutral-500">{{ __('Using 1 of 50 monitors.') }}</div>
                    </div>

                    <!-- Last 24 Hours Card -->
                    <div class="rounded-xl bg-[#1a1f2e] border border-neutral-800 p-5">
                        <div class="flex items-center justify-between mb-4">
                            <flux:heading size="md" class="text-white font-semibold">{{ __('Last 24 hours.') }}</flux:heading>
                            <button class="text-neutral-500 hover:text-neutral-400">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                </svg>
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-xl font-bold text-emerald-500 mb-1">100%</div>
                                <div class="text-xs text-neutral-400">{{ __('Overall uptime') }}</div>
                            </div>
                            <div>
                                <div class="text-xl font-bold text-white mb-1">0</div>
                                <div class="text-xs text-neutral-400">{{ __('Incidents') }}</div>
                            </div>
                            <div>
                                <div class="text-xl font-bold text-white mb-1">1d</div>
                                <div class="text-xs text-neutral-400">{{ __('Without incid.') }}</div>
                            </div>
                            <div>
                                <div class="text-xl font-bold text-white mb-1">0</div>
                                <div class="text-xs text-neutral-400">{{ __('Affected mon.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

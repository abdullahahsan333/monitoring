<x-layouts.app :title="__('Monitoring')">
    <div data-force-white>
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-2 lg:grid-cols-[1fr_240px] gap-6">
                <!-- Main Content -->
                <div class="space-y-6">
                    <!-- Header -->
                    <div class="flex items-center justify-between">
                        <flux:heading size="xl" class="!text-white">{{ __('Monitors.') }}</flux:heading>
                        <div class="flex items-center">
                            <flux:link :href="route('monitoring.create')" class="bg-blue-600 hover:bg-blue-700 !text-white px-4 py-2.5 rounded-l-lg rounded-r-none text-sm font-medium" wire:navigate>
                                + {{ __('New') }}
                            </flux:link>
                            <flux:dropdown position="bottom" align="end">
                                <flux:button variant="primary" class="bg-blue-600 hover:bg-blue-700 !text-white px-3 py-2 rounded-l-none rounded-r-lg">
                                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M5 12l5-6 5 6H5z"/>
                                    </svg>
                                </flux:button>
                                <flux:menu class="min-w-[220px] bg-panel !text-white">
                                    <flux:menu.item icon="document-text" class="hover:bg-gray-400 hover:!text-gray-900" onclick="window.location='{{ route('monitors.create') }}'">{{ __('Single monitor') }}</flux:menu.item>
                                    <flux:menu.item icon="sparkles" class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Monitor wizard') }}</flux:menu.item>
                                    <flux:menu.item icon="arrow-up-tray" class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Bulk upload') }}</flux:menu.item>
                                    <flux:menu.separator />
                                    <flux:menu.item disabled class="flex items-center gap-2 hover:bg-gray-400 hover:!text-gray-900">
                                        <span>{{ __('Group') }}</span>
                                        <span class="ms-auto text-[10px] rounded bg-neutral-800 px-2 py-0.5 text-amber-400">{{ __('Premium') }}</span>
                                    </flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </div>
                    </div>

                    <!-- Filters Bar -->
                    <div class="flex flex-wrap items-center gap-3">
                        <button class="inline-flex items-center gap-2 rounded-lg bg-panel border border-neutral-700 px-3 py-2 text-sm text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">
                            <label class="relative inline-flex items-center">
                                <input id="select-all" type="checkbox" class="peer appearance-none w-4 h-4 rounded border border-neutral-600 bg-neutral-800" />
                                <span class="absolute inset-0 hidden peer-checked:flex items-center justify-center text-xs">✔</span>
                            </label>
                            <span id="selection-count">0 / 1</span>
                        </button>
                        <button class="inline-flex items-center gap-2 rounded-lg bg-panel border border-neutral-700 px-3 py-2 text-sm text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">
                            <svg class="w-4 h-4 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a4 4 0 00-4 4v2H5a1 1 0 00-1 1v6a3 3 0 003 3h6a3 3 0 003-3V9a1 1 0 00-1-1h-1V6a4 4 0 00-4-4zm-2 6V6a2 2 0 114 0v2H8z"/>
                            </svg>
                            <span>{{ __('Show groups') }}</span>
                        </button>
                        <div class="ml-auto flex items-center gap-2">
                            <div class="relative">
                                <input 
                                    type="text" 
                                    class="rounded-lg bg-panel border border-neutral-700 px-4 py-2 text-sm text-neutral-200 placeholder-neutral-500 w-64 focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500" 
                                    placeholder="{{ __('Search by name or url') }}" 
                                />
                            </div>
                            <flux:dropdown position="bottom" align="start" id="filter-dropdown">
                                <flux:button variant="ghost" class="inline-flex items-center gap-2 rounded-lg border border-neutral-700 px-3 py-2 text-sm !text-white transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                    </svg>
                                    <span>{{ __('Filter') }}</span>
                                </flux:button>
                                <flux:menu class="min-w-[280px] p-4 bg-panel !text-white">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="font-semibold">{{ __('Filter') }}</span>
                                        <button type="button" class="text-neutral-400 filter-close">✖</button>
                                    </div>
                                    <div class="space-y-4 bg-panel">
                                        <div>
                                            <label class="text-xs text-neutral-400 mb-1 block">{{ __('Status') }}</label>
                                            <div class="ms-select relative">
                                                <button type="button" class="ms-trigger w-full inline-flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm !text-white transition-colors">
                                                    <span class="ms-value">None</span>
                                                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M5 7l5 6 5-6H5z"/>
                                                    </svg>
                                                </button>
                                                <div class="ms-panel absolute top-full left-0 mt-2 min-w-full rounded-xl border border-neutral-800 bg-[#1a1f2e] p-2 !text-white shadow-lg hidden z-50">
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                                        <input type="checkbox" value="Up" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Up</span>
                                                    </label>
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                                        <input type="checkbox" value="Down" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Down</span>
                                                    </label>
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                                        <input type="checkbox" value="Expiring domain" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Expiring domain</span>
                                                    </label>
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                                        <input type="checkbox" value="Expiring SSL certificate" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Expiring SSL certificate</span>
                                                    </label>
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                                        <input type="checkbox" value="Paused" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Paused</span>
                                                    </label>
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                                        <input type="checkbox" value="Not started" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Not started</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="text-xs text-neutral-400 mb-1 block">{{ __('Tags') }}</label>
                                            <input type="text" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm !text-white placeholder-neutral-400 transition-colors" placeholder="{{ __('Search for a tag...') }}" />
                                        </div>
                                        <div class="rounded-lg bg-[#1a1f2e] border border-neutral-800 p-3 text-center text-sm">
                                            <div>🫤 {{ __("You don't have any tags yet.") }}</div>
                                            <div class="mt-1 text-neutral-400">{{ __('To filter monitors based on tags create and attach tag to some monitor.') }}</div>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <button class="px-4 py-2 rounded-lg bg-[#1a1f2e] border border-neutral-700 !text-white text-sm hover:bg-gray-400 hover:text-gray-900 transition-colors filter-reset">{{ __('Reset') }}</button>
                                            <button class="px-4 py-2 rounded-lg bg-indigo-600 hover:bg-indigo-700 !text-white text-sm hover:bg-gray-400 hover:text-gray-900 transition-colors filter-apply">{{ __('Apply') }}</button>
                                        </div>
                                    </div>
                                </flux:menu>
                            </flux:dropdown>
                            <flux:dropdown position="bottom" align="start">
                                <flux:button variant="ghost" class="inline-flex items-center gap-2 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm !text-white transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12"/>
                                    </svg>
                                    <span>{{ __('Down first') }}</span>
                                </flux:button>
                                <flux:menu class="min-w-[220px] bg-panel !text-white">
                                    <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Down first') }}</flux:menu.item>
                                    <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Up first') }}</flux:menu.item>
                                    <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Paused first') }}</flux:menu.item>
                                    <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('A → Z') }}</flux:menu.item>
                                    <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Newest first') }}</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </div>
                    </div>

                    <!-- Monitor Item -->
                    <div class="monitor-row group rounded-xl bg-panel border border-neutral-800 p-4 hover:border-neutral-700 transition-all cursor-pointer" data-href="{{ route('monitoring.show') }}" tabindex="0">
                        <div class="flex items-center gap-4">
                            <!-- Checkbox (appears on hover) -->
                            <div class="monitor-checkbox-wrap w-0 opacity-0 overflow-hidden transition-all duration-200 group-hover:w-5 group-hover:opacity-100">
                                <label class="relative inline-flex">
                                    <input type="checkbox" class="peer monitor-checkbox appearance-none w-4 h-4 rounded border border-neutral-600 bg-neutral-800" />
                                    <span class="absolute inset-0 hidden peer-checked:flex items-center justify-center text-xs">✔</span>
                                </label>
                            </div>
                            
                            <!-- Status Dot -->
                            <div class="relative shrink-0">
                                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-emerald-500">
                                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                                </span>
                            </div>
                            
                            <!-- Monitor Info -->
                            <div class="flex-1 min-w-0">
                                <div class="!text-white font-medium text-base mb-1">
                                    <a href="{{ route('monitoring.show') }}" class="!text-white hover:!text-white">mail.google.com/</a>
                                </div>
                                <div class="flex items-center gap-2 text-xs">
                                    <span class="!inline-flex items-center rounded-md bg-[#252b3b] px-2 py-1 text-neutral-400 font-medium">HTTP</span>
                                    <span class="!text-neutral-500">Up 18 hr, 4 min</span>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-2">
                                <!-- Uptime Bar -->
                                <div class="hidden md:flex items-center gap-3">
                                    <div class="flex gap-0.5">
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                        <span class="w-0.5 h-3 rounded-sm bg-emerald-500"></span>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between">
                                    <div class="grid grid-cols-1 gap-2">
                                        <div class="flex items-center gap-0.5 text-sm text-neutral-400">
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                            <span class="w-1 h-2 bg-emerald-500"></span>
                                        </div>
                                        <!-- Check Interval -->
                                        <div class="w-full flex items-center justify-between text-sm text-neutral-400">
                                            <div class="flex items-center justify-center">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                <span>5 min</span>
                                            </div>
                                            <span class="text-sm text-neutral-400 font-medium">100%</span>
                                        </div>
                                    </div>

                                    <div class="flex items-center gap-2">
                                        <flux:dropdown>
                                            <flux:button variant="ghost" class="!px-2 !py-1 !text-white">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                                </svg>
                                            </flux:button>
                                            <flux:menu class="min-w-[220px] bg-panel !text-white">
                                                <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Edit monitor') }}</flux:menu.item>
                                                <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Integrations & team') }}</flux:menu.item>
                                                <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Maintenance') }}</flux:menu.item>
                                                <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Add / Remove tags') }}</flux:menu.item>
                                                <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Add to status page') }}</flux:menu.item>
                                                <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Clone monitor') }}</flux:menu.item>
                                                <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Pause monitor') }}</flux:menu.item>
                                                <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Reset stats') }}</flux:menu.item>
                                                <flux:menu.separator />
                                                <flux:menu.item class="!text-red-500 hover:bg-gray-400 hover:!text-gray-900">{{ __('Delete monitor') }}</flux:menu.item>
                                            </flux:menu>
                                        </flux:dropdown>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-4">
                    <!-- Current Status Card -->
                    <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                        <div class="flex items-center justify-between mb-4">
                            <flux:heading size="md" class="!text-white font-semibold">{{ __('Current status.') }}</flux:heading>
                        </div>
                        
                        <div class="flex items-center justify-center mb-4">
                            <div class="relative">
                                <span class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-500">
                                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                                </span>
                            </div>
                        </div>

                        <div class="flex items-center gap-4 mb-6">
                            <div class="flex-1 grid grid-cols-3 gap-4 text-center">
                                <div>
                                    <div class="text-2xl font-bold !text-white mb-1">0</div>
                                    <div class="text-xs text-neutral-400">{{ __('Down') }}</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold !text-white mb-1">1</div>
                                    <div class="text-xs text-neutral-400">{{ __('Up') }}</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold !text-white mb-1">0</div>
                                    <div class="text-xs text-neutral-400">{{ __('Paused') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-xs text-neutral-500">{{ __('Using 1 of 50 monitors.') }}</div>
                    </div>

                    <!-- Last 24 Hours Card -->
                    <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                        <div class="flex items-center justify-between mb-4">
                            <flux:heading size="md" class="!text-white font-semibold"><span id="range-title">{{ __('Last 24 hours.') }}</span></flux:heading>
                            <flux:dropdown position="bottom" align="end">
                                <flux:button variant="ghost" class="!text-white !px-2 !py-1">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                    </svg>
                                </flux:button>
                                <flux:menu class="min-w-[180px] bg-panel !text-white">
                                    <flux:menu.item data-range="24 hours" class="hover:bg-gray-400 hover:!text-gray-900">24 hours</flux:menu.item>
                                    <flux:menu.item data-range="7 days" class="hover:bg-gray-400 hover:!text-gray-900">7 days</flux:menu.item>
                                    <flux:menu.item data-range="30 days" class="hover:bg-gray-400 hover:!text-gray-900">30 days</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-xl font-bold text-emerald-500 mb-1">100%</div>
                                <div class="text-xs text-neutral-400">{{ __('Overall uptime') }}</div>
                            </div>
                            <div>
                                <div class="text-xl font-bold !text-white mb-1">0</div>
                                <div class="text-xs text-neutral-400">{{ __('Incidents') }}</div>
                            </div>
                            <div>
                                <div class="text-xl font-bold !text-white mb-1">1d</div>
                                <div class="text-xs text-neutral-400">{{ __('Without incid.') }}</div>
                            </div>
                            <div>
                                <div class="text-xl font-bold !text-white mb-1">0</div>
                                <div class="text-xs text-neutral-400">{{ __('Affected mon.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function updateSelectionCount() {
                var total = document.querySelectorAll('.monitor-row').length;
                var selected = document.querySelectorAll('.monitor-checkbox:checked').length;
                var countEl = document.getElementById('selection-count');
                if (countEl) countEl.textContent = selected + ' / ' + total;
            }
            function syncCheckboxWrap(chk) {
                var wrap = chk.closest('.monitor-checkbox-wrap');
                if (!wrap) return;
                if (chk.checked) {
                    wrap.classList.add('w-5', 'opacity-100');
                    wrap.classList.remove('w-0', 'opacity-0');
                } else {
                    wrap.classList.add('w-0', 'opacity-0');
                    wrap.classList.remove('w-5', 'opacity-100');
                }
            }
            document.querySelectorAll('.monitor-checkbox').forEach(function (chk) {
                syncCheckboxWrap(chk);
                chk.addEventListener('change', function () {
                    syncCheckboxWrap(chk);
                    updateSelectionCount();
                });
            });
            var selectAll = document.getElementById('select-all');
            if (selectAll) {
                selectAll.addEventListener('change', function () {
                    var target = !!selectAll.checked;
                    document.querySelectorAll('.monitor-checkbox').forEach(function (chk) {
                        chk.checked = target;
                        syncCheckboxWrap(chk);
                    });
                    updateSelectionCount();
                });
            }
            updateSelectionCount();
            var title = document.getElementById('range-title');
            document.querySelectorAll('[data-range]').forEach(function (el) {
                el.addEventListener('click', function () {
                    var val = el.getAttribute('data-range');
                    title.textContent = 'Last ' + val + '.';
                    var dd = el.closest('flux\\:dropdown');
                    if (dd) {
                        var panel = dd.querySelector(':scope > div, :scope > flux\\:menu');
                        if (panel) panel.classList.add('hidden');
                    }
                });
            });

            // Use Flux built-in dropdowns; no custom .dd handling needed.

            document.addEventListener('click', function () {
                document.querySelectorAll('.ms-select').forEach(function (ms) {
                    var mp = ms.querySelector(':scope > .ms-panel');
                    if (mp) mp.classList.add('hidden');
                });
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.ms-select').forEach(function (ms) {
                        var mp = ms.querySelector(':scope > .ms-panel');
                        if (mp) mp.classList.add('hidden');
                    });
                }
            });

            document.querySelectorAll('.ms-select').forEach(function (ms) {
                var trigger = ms.querySelector(':scope > .ms-trigger');
                var panel = ms.querySelector(':scope > .ms-panel');
                var valueEl = ms.querySelector(':scope > .ms-trigger > .ms-value');

                if (panel) {
                    panel.classList.add('hidden');
                    panel.classList.add('z-50');
                    panel.addEventListener('click', function (e) { e.stopPropagation(); });
                    panel.addEventListener('mousedown', function (e) { e.stopPropagation(); });
                }

                if (trigger) {
                    trigger.addEventListener('click', function (e) {
                        e.stopPropagation();
                        if (!panel) return;
                        var isOpen = !panel.classList.contains('hidden');
                        document.querySelectorAll('.ms-select').forEach(function (other) {
                            if (other !== ms) {
                                var op = other.querySelector(':scope > .ms-panel');
                                if (op) op.classList.add('hidden');
                            }
                        });
                        if (isOpen) {
                            panel.classList.add('hidden');
                        } else {
                            panel.classList.remove('hidden');
                        }
                    });
                    trigger.addEventListener('mousedown', function (e) { e.stopPropagation(); });
                }

                ms.querySelectorAll(':scope .ms-option input[type="checkbox"]').forEach(function (cb) {
                    cb.addEventListener('change', function () {
                        var selected = Array.from(ms.querySelectorAll(':scope .ms-option input[type="checkbox"]:checked'))
                            .map(function (c) { return c.value; });
                        if (valueEl) {
                            valueEl.textContent = selected.length ? selected.join(', ') : 'None';
                        }
                    });
                    cb.addEventListener('click', function (e) { e.stopPropagation(); });
                    cb.addEventListener('mousedown', function (e) { e.stopPropagation(); });
                });
                ms.querySelectorAll(':scope .ms-option').forEach(function (opt) {
                    opt.addEventListener('click', function (e) { e.stopPropagation(); });
                    opt.addEventListener('mousedown', function (e) { e.stopPropagation(); });
                });

                ms.addEventListener('click', function (e) { e.stopPropagation(); });
                ms.addEventListener('mousedown', function (e) { e.stopPropagation(); });
            });

            var filterDd = document.getElementById('filter-dropdown');
            function closeFluxDropdown(dd) {
                if (!dd) return;
                var panel = dd.querySelector(':scope > div, :scope > flux\\:menu');
                if (panel) panel.classList.add('hidden');
            }
            if (filterDd) {
                var filterPanel = filterDd.querySelector(':scope > flux\\:menu');
                if (filterPanel) {
                    filterPanel.addEventListener('click', function (e) { e.stopPropagation(); });
                    filterPanel.addEventListener('mousedown', function (e) { e.stopPropagation(); });
                }
                filterDd.querySelectorAll('.filter-apply, .filter-reset, .filter-close').forEach(function (btn) {
                    btn.addEventListener('click', function (e) {
                        e.stopPropagation();
                        closeFluxDropdown(filterDd);
                    });
                });
                document.addEventListener('click', function (e) {
                    var inside = e.target.closest('#filter-dropdown');
                    if (!inside) closeFluxDropdown(filterDd);
                });
                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') closeFluxDropdown(filterDd);
                });
            }
            document.querySelectorAll('.monitor-row').forEach(function (row) {
                row.addEventListener('click', function (e) {
                    var interactive = e.target.closest('input, button, a, flux\\:dropdown, .ms-select');
                    if (interactive) return;
                    var href = row.getAttribute('data-href');
                    if (href) window.location.href = href;
                });
                row.addEventListener('keydown', function (e) {
                    if (e.key === 'Enter' || e.key === ' ') {
                        var href = row.getAttribute('data-href');
                        if (href) window.location.href = href;
                    }
                });
            });
        });
    </script>
</x-layouts.app>

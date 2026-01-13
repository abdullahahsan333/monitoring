<x-layouts.app :title="__('Monitoring')">
    <div data-force-white>
        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 lg:grid-cols-[1fr_240px] gap-6">
                <!-- Main Content -->
                <div class="space-y-6">
                    <div class="flex items-center justify-between">
                        <flux:heading size="xl" class="text-main-panel-text font-semibold">{{ __('Monitors.') }}</flux:heading>
                        <div class="flex items-center">
                            <flux:link :href="route('monitoring.create')" class="bg-primary hover:bg-primary-hover text-main-panel-text px-4 py-2.5 rounded-l-lg rounded-r-none text-sm font-medium" wire:navigate>
                                + {{ __('New') }}
                            </flux:link>
                            <flux:dropdown position="bottom" align="end">
                                <flux:button variant="primary" class="bg-primary hover:bg-primary-hover text-white px-3 py-2 rounded-l-none rounded-r-lg">
                                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M5 12l5-6 5 6H5z"/>
                                    </svg>
                                </flux:button>
                                <flux:menu class="min-w-[220px] bg-main-panel-dropdown text-white">
                                    <flux:menu.item icon="document-text" :href="route('monitoring.create')" wire:navigate class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Single monitor') }}</flux:menu.item>
                                    <flux:menu.item icon="sparkles" class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Monitor wizard') }}</flux:menu.item>
                                    <flux:menu.item icon="arrow-up-tray" class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Bulk upload') }}</flux:menu.item>
                                    <flux:menu.separator />
                                    <flux:menu.item disabled class="flex items-center gap-2 text-white hover:bg-main-panel-dropdown-hover">
                                        <span>{{ __('Group') }}</span>
                                        <span class="ms-auto text-[10px] rounded bg-neutral-800 px-2 py-0.5 text-amber-400">{{ __('Premium') }}</span>
                                    </flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </div>
                    </div>

                    <!-- Filters Bar -->
                    <div class="flex flex-wrap items-center gap-3">
                        <button class="inline-flex items-center gap-2 rounded-lg bg-main-panel-components border border-neutral-700 px-3 py-2 text-sm text-main-panel-text hover:bg-main-panel-dropdown-hover transition-colors">
                            <label class="relative inline-flex items-center">
                                <input id="select-all" type="checkbox" class="peer appearance-none w-4 h-4 rounded border border-neutral-600 bg-neutral-800" />
                                <span class="absolute inset-0 hidden peer-checked:flex items-center justify-center text-xs">✔</span>
                            </label>
                            <span id="selection-count">0 / 1</span>
                        </button>
                        <button class="inline-flex items-center gap-2 rounded-lg bg-main-panel-components border border-neutral-700 px-3 py-2 text-sm text-main-panel-text hover:bg-main-panel-dropdown-hover transition-colors">
                            <svg class="w-4 h-4 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 2a4 4 0 00-4 4v2H5a1 1 0 00-1 1v6a3 3 0 003 3h6a3 3 0 003-3V9a1 1 0 00-1-1h-1V6a4 4 0 00-4-4zm-2 6V6a2 2 0 114 0v2H8z"/>
                            </svg>
                            <span>{{ __('Show groups') }}</span>
                        </button>
                        <div class="ml-auto flex items-center gap-2">
                            <div class="relative">
                                <input
                                    type="text"
                                    class="rounded-lg bg-main-panel-components border border-neutral-700 px-4 py-2 text-sm text-neutral-200 placeholder-neutral-500 w-64 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                                    placeholder="{{ __('Search by name or url') }}"
                                />
                            </div>
                            <flux:dropdown position="bottom" align="start" id="filter-dropdown">
                                <flux:button variant="ghost" class="inline-flex items-center gap-2 rounded-lg border border-neutral-700 px-3 py-2 text-sm text-white transition-colors">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                                    </svg>
                                    <span>{{ __('Filter') }}</span>
                                </flux:button>
                                <flux:menu class="min-w-[280px] p-4 bg-main-panel-dropdown text-white">
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="font-semibold">{{ __('Filter') }}</span>
                                        <button type="button" class="text-neutral-400 filter-close">✖</button>
                                    </div>
                                    <div class="space-y-4 bg-main-panel-components">
                                        <div>
                                            <label class="text-xs text-neutral-400 mb-1 block">{{ __('Status') }}</label>
                                            <div class="ms-select relative">
                                                <button type="button" class="ms-trigger w-full inline-flex items-center justify-between rounded-lg bg-main-panel-components border border-neutral-700 px-3 py-2 text-sm text-main-panel-text transition-colors">
                                                    <span class="ms-value">None</span>
                                                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                                        <path d="M5 7l5 6 5-6H5z"/>
                                                    </svg>
                                                </button>
                                                <div class="ms-panel absolute top-full left-0 mt-2 min-w-full rounded-xl border border-neutral-800 bg-main-panel-components p-2 text-main-panel-text shadow-lg hidden z-50">
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-main-panel-dropdown-hover">
                                                        <input type="checkbox" value="Up" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Up</span>
                                                    </label>
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-main-panel-dropdown-hover">
                                                        <input type="checkbox" value="Down" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Down</span>
                                                    </label>
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-main-panel-dropdown-hover">
                                                        <input type="checkbox" value="Expiring domain" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Expiring domain</span>
                                                    </label>
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-main-panel-dropdown-hover">
                                                        <input type="checkbox" value="Expiring SSL certificate" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Expiring SSL certificate</span>
                                                    </label>
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-main-panel-dropdown-hover">
                                                        <input type="checkbox" value="Paused" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Paused</span>
                                                    </label>
                                                    <label class="ms-option flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-main-panel-dropdown-hover">
                                                        <input type="checkbox" value="Not started" class="rounded border-neutral-600 bg-neutral-800 accent-gray-900" />
                                                        <span>Not started</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="text-xs text-neutral-400 mb-1 block">{{ __('Tags') }}</label>
                                            <input type="text" class="w-full rounded-lg bg-main-panel-components border border-neutral-700 px-3 py-2 text-sm text-main-panel-text placeholder-neutral-400 transition-colors" placeholder="{{ __('Search for a tag...') }}" />
                                        </div>
                                        <div class="rounded-lg bg-main-panel-components border border-neutral-800 p-3 text-center text-sm">
                                            <div>🫤 {{ __("You don't have any tags yet.") }}</div>
                                            <div class="mt-1 text-neutral-400">{{ __('To filter monitors based on tags create and attach tag to some monitor.') }}</div>
                                        </div>
                                        <div class="flex items-center justify-between">
                                            <button class="px-4 py-2 rounded-lg bg-main-panel-components border border-neutral-700 text-main-panel-text text-sm hover:bg-main-panel-dropdown-hover transition-colors filter-reset">{{ __('Reset') }}</button>
                                            <button class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-hover text-main-panel-text text-sm transition-colors filter-apply">{{ __('Apply') }}</button>
                                        </div>
                                    </div>
                                </flux:menu>
                            </flux:dropdown>
                            <flux:dropdown position="bottom" align="end">
                                <flux:button variant="ghost" class="inline-flex items-center gap-2 rounded-lg border border-neutral-700 px-3 py-2 text-sm text-white transition-colors">
                                    <svg class="w-4 h-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 3a1 1 0 011 1v10.586l2.293-2.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 14.586V4a1 1 0 011-1z"/>
                                    </svg>
                                    <span>{{ __('Down first') }}</span>
                                </flux:button>
                                <flux:menu class="min-w-[220px] bg-main-panel-dropdown text-white">
                                    <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Down first') }}</flux:menu.item>
                                    <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Up first') }}</flux:menu.item>
                                    <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Paused first') }}</flux:menu.item>
                                    <flux:menu.separator />
                                    <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('A → Z') }}</flux:menu.item>
                                    <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Newest first') }}</flux:menu.item>
                                </flux:menu>
                            </flux:dropdown>
                        </div>
                    </div>

                    <!-- Monitors List -->
                    @forelse ($monitors as $monitor)
                        <div class="monitor-row group rounded-xl bg-main-panel-components border border-neutral-800 p-4 hover:border-neutral-700 transition-all cursor-pointer" data-href="{{ route('monitoring.show', $monitor->id) }}" tabindex="0">
                            <div class="flex items-center gap-4">
                                <!-- Checkbox -->
                                <div class="monitor-checkbox-wrap w-0 opacity-0 overflow-hidden transition-all duration-200 group-hover:w-5 group-hover:opacity-100">
                                    <label class="relative inline-flex">
                                        <input type="checkbox" class="peer monitor-checkbox appearance-none w-4 h-4 rounded border border-neutral-600 bg-neutral-800" />
                                        <span class="absolute inset-0 hidden peer-checked:flex items-center justify-center"></span>
                                    </label>
                                </div>
                                
                                <!-- Status Dot -->
                                <div class="relative shrink-0">
                                    <span class="flex h-6 w-6 items-center justify-center rounded-full bg-{{ $monitor->current_status === 'Up' ? 'emerald-500' : 'red-500' }}">
                                        @if($monitor->current_status === 'Up')
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="size-2 text-white">
                                            <path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path>
                                        </svg>
                                        @else
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="size-2 text-white">
                                            <path d="M96 448h106.7V64H96v384zM309.3 64v384H416V64H309.3z"></path>
                                        </svg>
                                        @endif
                                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-{{ $monitor->current_status === 'Up' ? 'emerald-400' : 'red-400' }} opacity-75"></span>
                                    </span>
                                </div>
                                
                                <!-- Monitor Info -->
                                <div class="flex-1 min-w-0">
                                    <div class="text-main-panel-text font-medium text-base mb-1">
                                        <a href="{{ route('monitoring.show', $monitor->id) }}" class="text-main-panel-text hover:text-main-panel-text">{{ $monitor->name }}</a>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-neutral-400">
                                        <span>{{ strtoupper($monitor->type) }}</span>
                                        <span class="inline-flex items-center gap-1 rounded bg-[#253047] px-1.5 py-0.5 text-[10px] text-neutral-300">{{ $monitor->url }}</span>
                                    </div>
                                </div>
                                
                                <!-- Interval -->
                                <div class="shrink-0 text-right hidden md:block">
                                    <div class="text-main-panel-text font-medium">{{ $monitor->interval_seconds / 60 }} min</div>
                                    <div class="text-xs text-neutral-400">Interval</div>
                                </div>
                                
                                <!-- Uptime -->
                                <div class="shrink-0 text-right hidden md:block">
                                    <div class="text-main-panel-text font-medium">{{ $monitor->uptime_24h }}%</div>
                                    <div class="text-xs text-neutral-400">Uptime</div>
                                </div>
                                
                                <!-- Progress Bar (24-hour uptime bars) -->
                                <div class="shrink-0 flex gap-0.5 items-center">
                                    @foreach ($monitor->uptimeBars ?? [] as $color)
                                        <span class="tooltip s-bar w-1 h-3 rounded-sm bg-{{ $color }}">
                                            <div class="tooltiptext">
                                                        Jan 12, ’26, 01:06 – 02:05 GMT+6<br>
                                                        Up 100%
                                            </div>
                                        </span>
                                    @endforeach
                                </div>
                                
                                <!-- Response Time -->
                                <div class="shrink-0 text-right hidden md:block">
                                    <div class="text-main-panel-text font-medium">{{ $monitor->avg_response_ms ?? '-' }} ms</div>
                                    <div class="text-xs text-neutral-400">Response</div>
                                </div>
                                
                                <!-- Actions -->
                                <div class="shrink-0">
                                    <flux:dropdown position="bottom" align="end">
                                        <flux:button variant="ghost" class="!px-2 !py-1 text-white">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"/>
                                            </svg>
                                        </flux:button>
                                        <flux:menu class="min-w-[220px] bg-main-panel-dropdown text-white">
                                            <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Edit monitor') }}</flux:menu.item>
                                            <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Integrations & team') }}</flux:menu.item>
                                            <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Maintenance') }}</flux:menu.item>
                                            <flux:menu.item class="add-remove-tags-btn text-white hover:bg-main-panel-dropdown-hover">{{ __('Add / Remove tags') }}</flux:menu.item>
                                            <flux:menu.item class="add-to-status-page-btn text-white hover:bg-main-panel-dropdown-hover">{{ __('Add to status page') }}</flux:menu.item>
                                            <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Clone monitor') }}</flux:menu.item>
                                            <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Pause monitor') }}</flux:menu.item>
                                            <flux:menu.item class="text-white hover:bg-main-panel-dropdown-hover">{{ __('Reset stats') }}</flux:menu.item>
                                            <flux:menu.separator />
                                            <flux:menu.item class="!text-red-500 hover:bg-main-panel-dropdown-hover">{{ __('Delete monitor') }}</flux:menu.item>
                                        </flux:menu>
                                    </flux:dropdown>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="rounded-xl bg-main-panel-components border border-neutral-800 p-6 text-center">
                            <div class="text-neutral-300 font-medium">{{ __('No monitors yet.') }}</div>
                            <div class="text-xs text-neutral-400 mt-2">{{ __('Add your first monitor to get started.') }}</div>
                        </div>
                    @endforelse
                </div>

                <!-- Sidebar -->
                <div class="space-y-4">
                    <!-- Current Status Card -->
                    <div class="rounded-xl bg-main-panel-components border border-neutral-800 p-5">
                        <div class="flex items-center justify-between mb-4">
                            <flux:heading size="md" class="text-main-panel-text font-semibold">{{ __('Current status.') }}</flux:heading>
                        </div>
                        
                        <div class="flex items-center justify-center mb-4">
                            <div class="relative">
                                @if($statusCounts['down'] > 0)
                                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-red-500">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="size-2 text-white">
                                            <path d="M96 448h106.7V64H96v384zM309.3 64v384H416V64H309.3z"></path>
                                        </svg>
                                    </span>
                                @else
                                    <span class="flex h-10 w-10 items-center justify-center rounded-full bg-emerald-500">
                                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="size-2 text-white">
                                            <path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z"></path>
                                        </svg>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="flex items-center gap-4 mb-6">
                            <div class="flex-1 grid grid-cols-3 gap-4 text-center">
                                <div>
                                    <div class="text-2xl font-bold text-main-panel-text mb-1">{{ $statusCounts['down'] }}</div>
                                    <div class="text-xs text-neutral-400">{{ __('Down') }}</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-main-panel-text mb-1">{{ $statusCounts['up'] }}</div>
                                    <div class="text-xs text-neutral-400">{{ __('Up') }}</div>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-main-panel-text mb-1">{{ $statusCounts['paused'] }}</div>
                                    <div class="text-xs text-neutral-400">{{ __('Paused') }}</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-xs text-neutral-500">
                            {{ __('Using') }} {{ $monitorUsage['used'] }} {{ __('of') }} {{ $monitorUsage['limit'] }} {{ __('monitors.') }}
                        </div>
                    </div>

                    <!-- Last 24 Hours Card -->
                    <div class="rounded-xl bg-main-panel-components border border-neutral-800 p-5">
                        <div class="flex items-center justify-between mb-4">
                            <flux:heading size="md" class="text-main-panel-text font-semibold">
                                <span id="range-title">{{ __('Last 24 hours.') }}</span>
                            </flux:heading>
                            <!-- keep your existing dropdown – it already changes title via JS -->
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-xl font-bold text-emerald-500 mb-1">{{ $overallUptime24h }}%</div>
                                <div class="text-xs text-neutral-400">{{ __('Overall uptime') }}</div>
                            </div>
                            <div>
                                <div class="text-xl font-bold text-main-panel-text mb-1">{{ $incidentsLast24h }}</div>
                                <div class="text-xs text-neutral-400">{{ __('Incidents') }}</div>
                            </div>
                            <div>
                                <div class="text-xl font-bold text-main-panel-text mb-1">{{ $longestGoodStreak }}</div>
                                <div class="text-xs text-neutral-400">{{ __('Without incid.') }}</div>
                            </div>
                            <div>
                                <div class="text-xl font-bold text-main-panel-text mb-1">{{ $affectedMonitors }}</div>
                                <div class="text-xs text-neutral-400">{{ __('Affected mon.') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add/Remove Tags Modal -->
    <div id="tags-modal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-main-panel-components rounded-xl border border-neutral-800 w-full max-w-md mx-4">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-main-panel-text">{{ __('Add / Remove tags') }}</h2>
                    <button id="close-tags-modal" class="text-neutral-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="mb-6">
                    <input 
                        type="text" 
                        id="tag-search" 
                        placeholder="{{ __('Search tags...') }}"
                        class="w-full rounded-lg bg-main-panel-dropdown border border-neutral-700 px-4 py-3 text-sm text-main-panel-text placeholder-neutral-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                    />
                </div>

                <div class="mb-6">
                    <button id="deselect-all-tags" class="text-sm text-neutral-400 hover:text-white transition-colors">
                        {{ __('Deselect all') }}
                    </button>
                </div>

                <div class="space-y-2 mb-6 max-h-64 overflow-y-auto" id="tags-list">
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="git" class="tag-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <span class="text-main-panel-text">git</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="production" class="tag-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <span class="text-main-panel-text">production</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="api" class="tag-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <span class="text-main-panel-text">api</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="database" class="tag-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <span class="text-main-panel-text">database</span>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="critical" class="tag-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <span class="text-main-panel-text">critical</span>
                    </label>
                </div>

                <div class="flex gap-3">
                    <button id="cancel-tags" class="flex-1 px-4 py-2.5 rounded-lg border border-neutral-700 text-main-panel-text hover:bg-main-panel-dropdown transition-colors">
                        {{ __('Cancel') }}
                    </button>
                    <button id="save-tags" class="flex-1 px-4 py-2.5 rounded-lg bg-primary hover:bg-primary-hover text-main-panel-text transition-colors">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add / Remove monitors to Status page Modal -->
    <div id="status-page-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-main-panel-components rounded-xl border border-neutral-800 w-full max-w-md mx-4">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-main-panel-text">{{ __('Add / Remove monitors to Status page') }}</h2>
                    <button id="close-status-modal" class="text-neutral-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="mb-6">
                    <input 
                        type="text" 
                        id="monitor-search" 
                        placeholder="{{ __('Search monitors...') }}"
                        class="w-full rounded-lg bg-main-panel-dropdown border border-neutral-700 px-4 py-3 text-sm text-main-panel-text placeholder-neutral-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                    />
                </div>

                <div class="mb-6">
                    <button id="deselect-all-monitors" class="text-sm text-neutral-400 hover:text-white transition-colors">
                        {{ __('Deselect all') }}
                    </button>
                </div>

                <div class="space-y-2 mb-6 max-h-64 overflow-y-auto" id="monitors-list">
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="mail.google.com" class="monitor-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <div class="flex-1">
                            <div class="text-main-panel-text font-medium">mail.google.com</div>
                            <div class="text-xs text-neutral-400">HTTP Monitor</div>
                        </div>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="api.example.com" class="monitor-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <div class="flex-1">
                            <div class="text-main-panel-text font-medium">api.example.com</div>
                            <div class="text-xs text-neutral-400">API Monitor</div>
                        </div>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="database.local" class="monitor-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <div class="flex-1">
                            <div class="text-main-panel-text font-medium">database.local</div>
                            <div class="text-xs text-neutral-400">Database Monitor</div>
                        </div>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="website.com" class="monitor-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <div class="flex-1">
                            <div class="text-main-panel-text font-medium">website.com</div>
                            <div class="text-xs text-neutral-400">Website Monitor</div>
                        </div>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="cdn.assets.com" class="monitor-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <div class="flex-1">
                            <div class="text-main-panel-text font-medium">cdn.assets.com</div>
                            <div class="text-xs text-neutral-400">CDN Monitor</div>
                        </div>
                    </label>
                </div>

                <div class="flex gap-3">
                    <button id="cancel-status" class="flex-1 px-4 py-2.5 rounded-lg border border-neutral-700 text-main-panel-text hover:bg-main-panel-dropdown transition-colors">
                        {{ __('Cancel') }}
                    </button>
                    <button id="save-status" class="flex-1 px-4 py-2.5 rounded-lg bg-primary hover:bg-primary-hover text-main-panel-text transition-colors">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Add to Status Page Modal -->
    <div id="status-page-modal" class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center z-50 hidden">
        <div class="bg-main-panel-components rounded-xl border border-neutral-800 w-full max-w-md mx-4">
            <div class="p-6">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-main-panel-text">{{ __('Add to status page') }}</h2>
                    <button id="close-status-modal" class="text-neutral-400 hover:text-white transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <div class="mb-6">
                    <label class="text-xs text-neutral-400 mb-1 block">{{ __('Select status page') }}</label>
                    <select class="w-full rounded-lg bg-main-panel-dropdown border border-neutral-700 px-4 py-3 text-sm text-main-panel-text focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary">
                        <option value="">{{ __('Choose a status page...') }}</option>
                        <option value="1">{{ __('Main Status Page') }}</option>
                        <option value="2">{{ __('Internal Status Page') }}</option>
                        <option value="3">{{ __('Public Status Page') }}</option>
                    </select>
                </div>

                <div class="mb-6">
                    <label class="text-xs text-neutral-400 mb-1 block">{{ __('Search monitors...') }}</label>
                    <input 
                        type="text" 
                        id="monitor-search" 
                        placeholder="{{ __('Search monitors...') }}"
                        class="w-full rounded-lg bg-main-panel-dropdown border border-neutral-700 px-4 py-3 text-sm text-main-panel-text placeholder-neutral-400 focus:border-primary focus:outline-none focus:ring-1 focus:ring-primary"
                    />
                </div>

                <div class="mb-6">
                    <button id="deselect-all-monitors" class="text-sm text-neutral-400 hover:text-white transition-colors">
                        {{ __('Deselect all') }}
                    </button>
                </div>

                <div class="space-y-2 mb-6 max-h-64 overflow-y-auto" id="monitors-list">
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="mail.google.com" class="monitor-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <div class="flex-1">
                            <div class="text-main-panel-text font-medium">mail.google.com</div>
                            <div class="text-xs text-neutral-400">HTTP Monitor</div>
                        </div>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="api.example.com" class="monitor-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <div class="flex-1">
                            <div class="text-main-panel-text font-medium">api.example.com</div>
                            <div class="text-xs text-neutral-400">API Monitor</div>
                        </div>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="database.local" class="monitor-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <div class="flex-1">
                            <div class="text-main-panel-text font-medium">database.local</div>
                            <div class="text-xs text-neutral-400">Database Monitor</div>
                        </div>
                    </label>
                    <label class="flex items-center gap-3 p-3 rounded-lg hover:bg-main-panel-dropdown cursor-pointer transition-colors">
                        <input type="checkbox" value="website.com" class="monitor-checkbox w-4 h-4 rounded border-neutral-600 bg-neutral-800 accent-primary" />
                        <div class="flex-1">
                            <div class="text-main-panel-text font-medium">website.com</div>
                            <div class="text-xs text-neutral-400">Website Monitor</div>
                        </div>
                    </label>
                </div>

                <div class="flex gap-3">
                    <button id="cancel-status" class="flex-1 px-4 py-2.5 rounded-lg border border-neutral-700 text-main-panel-text hover:bg-main-panel-dropdown transition-colors">
                        {{ __('Cancel') }}
                    </button>
                    <button id="save-status" class="flex-1 px-4 py-2.5 rounded-lg bg-primary hover:bg-primary-hover text-main-panel-text transition-colors">
                        {{ __('Save') }}
                    </button>
                </div>
            </div>
        </div>
    </div>

    @push('all_script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Clear caches first
            if (typeof clearCaches === 'function') {
                clearCaches();
            }
            
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

            document.addEventListener('click', function (e) {
                document.querySelectorAll('.ms-select').forEach(function (ms) {
                    if (ms.contains(e.target)) return;
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
                var trigger = ms.querySelector('.ms-trigger');
                var panel = ms.querySelector('.ms-panel');
                var valueEl = trigger && trigger.querySelector('.ms-value') ? trigger.querySelector('.ms-value') : null;

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
                // Close Flux dropdown by hiding menu (same pattern as data-range dropdowns)
                var panel = dd.querySelector('flux\\:menu');
                if (panel) {
                    panel.classList.add('hidden');
                }
            }
            if (filterDd) {
                function applyFilters() {
                    var statuses = Array.from(filterDd.querySelectorAll('.ms-option input[type="checkbox"]:checked')).map(function (c) { return c.value; });
                    var tag = (filterDd.querySelector('input[type="text"]') || { value: '' }).value.trim().toLowerCase();
                    document.querySelectorAll('.monitor-row').forEach(function (row) {
                        var text = row.textContent.toLowerCase();
                        var statusMatch = !statuses.length || statuses.some(function (s) { return text.indexOf(s.toLowerCase()) !== -1; });
                        var tagMatch = !tag || text.indexOf(tag) !== -1;
                        if (statusMatch && tagMatch) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                }
                function resetFilters() {
                    filterDd.querySelectorAll('.ms-option input[type="checkbox"]').forEach(function (c) { c.checked = false; c.dispatchEvent(new Event('change')); });
                    var input = filterDd.querySelector('input[type="text"]');
                    if (input) input.value = '';
                    document.querySelectorAll('.monitor-row').forEach(function (row) { row.style.display = ''; });
                }

                // Handle filter buttons - apply/reset/close
                filterDd.querySelectorAll('.filter-apply, .filter-reset, .filter-close').forEach(function (btn) {
                    btn.addEventListener('click', function (e) {
                        e.stopPropagation();
                        e.preventDefault();
                        if (btn.classList.contains('filter-apply')) {
                            applyFilters();
                        }
                        if (btn.classList.contains('filter-reset')) {
                            resetFilters();
                        }
                        // Close Flux dropdown
                        closeFluxDropdown(filterDd);
                    });
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

            // Tags Modal Functionality
            const tagsModal = document.getElementById('tags-modal');
            const tagSearch = document.getElementById('tag-search');
            const tagsList = document.getElementById('tags-list');
            const deselectAllBtn = document.getElementById('deselect-all-tags');
            const closeTagsModalBtn = document.getElementById('close-tags-modal');
            const cancelTagsBtn = document.getElementById('cancel-tags');
            const saveTagsBtn = document.getElementById('save-tags');

            // Status Page Modal Functionality
            const statusModal = document.getElementById('status-page-modal');
            const monitorSearch = document.getElementById('monitor-search');
            const monitorsList = document.getElementById('monitors-list');
            const deselectAllMonitorsBtn = document.getElementById('deselect-all-monitors');
            const closeStatusModalBtn = document.getElementById('close-status-modal');
            const cancelStatusBtn = document.getElementById('cancel-status');
            const saveStatusBtn = document.getElementById('save-status');

            // Open tags modal when "Add / Remove tags" is clicked
            document.addEventListener('click', function(e) {
                const target = e.target.closest('.add-remove-tags-btn');
                if (target) {
                    e.preventDefault();
                    e.stopPropagation();
                    const tagsModal = document.getElementById('tags-modal');
                    if (tagsModal) {
                        tagsModal.classList.remove('hidden');
                    }
                    
                    // Close dropdown
                    const dropdown = target.closest('flux\:dropdown');
                    if (dropdown) {
                        const menu = dropdown.querySelector('flux\:menu');
                        if (menu) menu.classList.add('hidden');
                    }
                }
            });

            // Open status modal when "Add to status page" is clicked
            document.addEventListener('click', function(e) {
                const target = e.target.closest('.add-to-status-page-btn');
                if (target) {
                    e.preventDefault();
                    e.stopPropagation();
                    const statusModal = document.getElementById('status-page-modal');
                    if (statusModal) {
                        statusModal.classList.remove('hidden');
                    }
                    
                    // Close dropdown
                    const dropdown = target.closest('flux\:dropdown');
                    if (dropdown) {
                        const menu = dropdown.querySelector('flux\:menu');
                        if (menu) menu.classList.add('hidden');
                    }
                }
            });

            // Close modal functions
            function closeTagsModal() {
                tagsModal.classList.add('hidden');
                tagSearch.value = '';
                filterTags('');
            }

            function closeStatusModal() {
                statusModal.classList.add('hidden');
                monitorSearch.value = '';
                filterMonitors('');
            }

            closeTagsModalBtn.addEventListener('click', closeTagsModal);
            cancelTagsBtn.addEventListener('click', closeTagsModal);

            closeStatusModalBtn.addEventListener('click', closeStatusModal);
            cancelStatusBtn.addEventListener('click', closeStatusModal);

            // Close modals on background click
            tagsModal.addEventListener('click', function(e) {
                if (e.target === tagsModal) {
                    closeTagsModal();
                }
            });

            statusModal.addEventListener('click', function(e) {
                if (e.target === statusModal) {
                    closeStatusModal();
                }
            });

            // Close modals on Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    if (!tagsModal.classList.contains('hidden')) {
                        closeTagsModal();
                    }
                    if (!statusModal.classList.contains('hidden')) {
                        closeStatusModal();
                    }
                }
            });

            // Filter tags based on search
            function filterTags(searchTerm) {
                const tags = tagsList.querySelectorAll('label');
                tags.forEach(function(tag) {
                    const tagName = tag.querySelector('span').textContent.toLowerCase();
                    if (tagName.includes(searchTerm.toLowerCase())) {
                        tag.style.display = 'flex';
                    } else {
                        tag.style.display = 'none';
                    }
                });
            }

            // Filter monitors based on search
            function filterMonitors(searchTerm) {
                const monitors = monitorsList.querySelectorAll('label');
                monitors.forEach(function(monitor) {
                    const monitorName = monitor.querySelector('.text-main-panel-text').textContent.toLowerCase();
                    const monitorType = monitor.querySelector('.text-neutral-400').textContent.toLowerCase();
                    if (monitorName.includes(searchTerm.toLowerCase()) || monitorType.includes(searchTerm.toLowerCase())) {
                        monitor.style.display = 'flex';
                    } else {
                        monitor.style.display = 'none';
                    }
                });
            }

            tagSearch.addEventListener('input', function() {
                filterTags(this.value);
            });

            monitorSearch.addEventListener('input', function() {
                filterMonitors(this.value);
            });

            // Deselect all tags
            deselectAllBtn.addEventListener('click', function() {
                const checkboxes = tagsList.querySelectorAll('.tag-checkbox');
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = false;
                });
            });

            // Deselect all monitors
            deselectAllMonitorsBtn.addEventListener('click', function() {
                const checkboxes = monitorsList.querySelectorAll('.monitor-checkbox');
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = false;
                });
            });

            // Save tags (you can implement actual save logic here)
            saveTagsBtn.addEventListener('click', function() {
                const selectedTags = Array.from(tagsList.querySelectorAll('.tag-checkbox:checked'))
                    .map(function(checkbox) {
                        return checkbox.value;
                    });
                
                // Here you would typically send the selected tags to your backend
                closeTagsModal();
            });

            // Save monitors to status page (you can implement actual save logic here)
            saveStatusBtn.addEventListener('click', function() {
                const selectedMonitors = Array.from(monitorsList.querySelectorAll('.monitor-checkbox:checked'))
                    .map(function(checkbox) {
                        return checkbox.value;
                    });
                
                // Here you would typically send the selected monitors to your backend
                closeStatusModal();
            });
        });
    </script>
    @endpush
</x-layouts.app>
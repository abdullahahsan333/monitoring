<x-layouts.app :title="__('Create Monitor')">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">

    <div class="mx-auto max-w-7xl pb-8">

        <div class="flex items-center justify-between mb-4">
            <a href="{{ route('monitoring.index') }}" class="inline-flex items-center gap-1 rounded-full bg-[#1a1f2e] px-2.5 py-1 text-xs text-neutral-400 border border-neutral-700" wire:navigate>
                <span>‹</span>
                <span>{{ __('Monitoring') }}</span>
            </a>
        </div>

        <div class="relative grid grid-cols-1 lg:grid-cols-[1fr_260px] gap-6 mb-10">
            <div id="tab-details" class="space-y-6 lg:order-1 order-2" role="tabpanel" aria-labelledby="tablink-details">
                <div class="text-neutral-200 font-medium">{{ __('Add Single Monitor') }}</div>
                
                <form id="monitor-create-form" class="space-y-6" 
                    action="{{ route('monitoring.store') }}" 
                    method="POST">
                    @csrf
                    
                    <!-- Monitor type selection -->
                    <div class="rounded-xl !bg-panel border border-neutral-800 overflow-hidden">
                        <div class="px-5 py-4 border-b border-neutral-800">
                            <div class="text-neutral-200 font-medium">{{ __('Monitor type') }}</div>
                        </div>

                        <div class="dd">
                            <button type="button" class="dd-trigger w-full flex items-start gap-4 px-5 py-4 bg-[#121826] hover:bg-sidebar-active transition-colors">
                                <span class="dd-current-icon flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-400" data-dd-icon>
                                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6.5A2.5 2.5 0 016.5 4h11A2.5 2.5 0 0120 6.5V15a2 2 0 01-2 2H6a2 2 0 01-2-2V6.5z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 9h16" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 20h4" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 17v3" />
                                    </svg>
                                </span>
                                <div class="flex-1 text-left">
                                    <div class="dd-current-title text-white font-semibold">HTTP / website monitoring</div>
                                    <div class="dd-current-desc mt-1 text-xs text-neutral-400">Use HTTP(s) monitor to monitor your website, API endpoint, or anything running on HTTP.</div>
                                </div>
                                <span class="mt-0.5 text-neutral-400">
                                    <svg data-dd-chevron class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 15l6-6 6 6" />
                                    </svg>
                                </span>
                            </button>

                            <div class="dd-panel border-t border-neutral-800 hidden">
                                <button type="button" class="w-full flex items-start gap-4 px-5 py-4 hover:bg-sidebar-active transition-colors" data-dd-option data-value="http" data-title="HTTP / website monitoring" data-description="Use HTTP(s) monitor to monitor your website, API endpoint, or anything running on HTTP.">
                                    <span class="dd-current-icon flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-emerald-500/10 text-emerald-400" data-dd-icon>
                                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6.5A2.5 2.5 0 016.5 4h11A2.5 2.5 0 0120 6.5V15a2 2 0 01-2 2H6a2 2 0 01-2-2V6.5z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 9h16" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 20h4" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 17v3" />
                                        </svg>
                                    </span>
                                    <div class="flex-1 text-left">
                                        <div class="dd-current-title text-white font-semibold">HTTP / website monitoring</div>
                                        <div class="dd-current-desc mt-1 text-xs text-neutral-400">Use HTTP(s) monitor to monitor your website, API endpoint, or anything running on HTTP.</div>
                                    </div>
                                </button>
                                <button type="button" class="w-full flex items-start gap-4 px-5 py-4 hover:bg-sidebar-active transition-colors" data-dd-option data-value="keyword" data-title="Keyword monitoring" data-description="Check presence or absence of specific text in request's response body (typically HTML or JSON).">
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-violet-500/10 text-violet-300" data-dd-icon>
                                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 14l-2 2 3 3 2-2" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 12l7-7a4 4 0 015 5l-7 7" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 7l2 2" />
                                        </svg>
                                    </span>
                                    <div class="flex-1 text-left">
                                        <div class="text-white font-semibold">Keyword monitoring</div>
                                        <div class="mt-1 text-xs text-neutral-400">Check the presence or absence of specific text in the request's response body (typically HTML or JSON).</div>
                                    </div>
                                </button>

                                <button type="button" class="w-full flex items-start gap-4 px-5 py-4 hover:bg-sidebar-active transition-colors" data-dd-option data-value="ping" data-title="Ping monitoring" data-description="Make sure your server or any device in network is always available.">
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-sky-500/10 text-sky-300" data-dd-icon>
                                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3a9 9 0 109 9 9 9 0 00-9-9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 7a5 5 0 105 5 5 5 0 00-5-5z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11a1 1 0 101 1 1 1 0 00-1-1z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 12h2" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2 12h2" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v2" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 20v2" />
                                        </svg>
                                    </span>
                                    <div class="flex-1 text-left">
                                        <div class="text-white font-semibold">Ping monitoring</div>
                                        <div class="mt-1 text-xs text-neutral-400">Make sure your server or any device in the network is always available.</div>
                                    </div>
                                </button>

                                <button type="button" class="w-full flex items-start gap-4 px-5 py-4 hover:bg-sidebar-active transition-colors" data-dd-option data-value="port" data-title="Port monitoring" data-description="Monitor any service on your server. Useful for SMTP, POP3, FTP, and other services running on specific TCP ports.">
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-fuchsia-500/10 text-fuchsia-300" data-dd-icon>
                                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 9h10v10H7z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 9V7a2 2 0 012-2h2a2 2 0 012 2v2" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v2" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 19v2" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19v2" />
                                        </svg>
                                    </span>
                                    <div class="flex-1 text-left">
                                        <div class="text-white font-semibold">Port monitoring</div>
                                        <div class="mt-1 text-xs text-neutral-400">Monitor any service on your server. Useful for SMTP, POP3, FTP, and other services running on specific TCP ports.</div>
                                    </div>
                                </button>

                                <div class="w-full flex items-start gap-4 px-5 py-4 bg-[#0d1320] opacity-60">
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-amber-500/10 text-amber-300">
                                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V9a4 4 0 018 0v2" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M7 11h10v9a2 2 0 01-2 2H9a2 2 0 01-2-2v-9z" />
                                        </svg>
                                    </span>
                                    <div class="flex-1 text-left">
                                        <div class="text-white font-semibold">Cron job / Heartbeat monitoring</div>
                                        <div class="mt-1 flex flex-wrap items-center gap-2 text-xs text-neutral-400">
                                            <span class="inline-flex items-center gap-1">
                                                <svg class="h-3.5 w-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V9a4 4 0 018 0v2" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 11h10v9a2 2 0 01-2 2H9a2 2 0 01-2-2v-9z" />
                                                </svg>
                                                Available only in <span class="text-white font-semibold">Solo, Team</span> and <span class="text-white font-semibold">Enterprise</span>.
                                            </span>
                                            <a href="#" class="text-emerald-400 underline underline-offset-2 hover:text-emerald-300">Upgrade now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full flex items-start gap-4 px-5 py-4 bg-[#0d1320] opacity-60">
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-amber-500/10 text-amber-300">
                                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 4h12v4H6z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 10h12v4H6z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 16h12v4H6z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 6h.01M10 6h.01" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M10 12h.01" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 18h.01M10 18h.01" />
                                        </svg>
                                    </span>
                                    <div class="flex-1 text-left">
                                        <div class="text-white font-semibold">DNS monitoring</div>
                                        <div class="mt-1 flex flex-wrap items-center gap-2 text-xs text-neutral-400">
                                            <span class="inline-flex items-center gap-1">
                                                <svg class="h-3.5 w-3.5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 11V7" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 11V9a4 4 0 018 0v2" />
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 11h10v9a2 2 0 01-2 2H9a2 2 0 01-2-2v-9z" />
                                                </svg>
                                                Available only in <span class="text-white font-semibold">Solo, Team</span> and <span class="text-white font-semibold">Enterprise</span>.
                                            </span>
                                            <a href="#" class="text-emerald-400 underline underline-offset-2 hover:text-emerald-300">Upgrade now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="monitor_type" id="monitor-type-value" value="http">
                    </div>

                    <!-- Rest of the form fields -->
                    <div class="rounded-xl !bg-panel border border-neutral-800 p-5 space-y-6">
                        <flux:input
                            name="url"
                            :label="__('URL to monitor')"
                            type="text"
                            placeholder="https://"
                            required
                        />
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="text-xs text-neutral-200 mb-1 block">{{ __('Group') }}</label>
                                <div class="text-[11px] text-neutral-400 mb-2">{{ __('Groups are available only on Paid plans.') }} <a href="#" class="text-emerald-500 underline">{{ __('Upgrade now') }}</a></div>
                                <div class="text-[11px] text-neutral-400 mb-2">{{ __('Your monitor will be automatically added to the chosen group') }}</div>
                                <select class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white" name="group">
                                    <option value="">{{ __('Monitors (default)') }}</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs text-neutral-200 mb-1 block">{{ __('Add tags') }}</label>
                                <div class="text-[11px] text-neutral-400 mb-2">{{ __('Tags will enable you to organise your monitors in a better way') }}</div>
                                <div id="monitor-tags-container" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 min-h-[42px] flex flex-col gap-2">
                                    <div class="tags-list flex flex-wrap gap-2"></div>
                                    <input type="text" id="monitor-tags-input" class="w-full bg-transparent border-0 outline-none text-sm text-white placeholder-neutral-400" placeholder="{{ __('Type and press Enter or comma to add tag...') }}" autocomplete="off">
                                </div>
                                <input type="hidden" name="tags" id="monitor-tags-value" value="">
                            </div>
                        </div>
                        <div class="border-t border-neutral-800"></div>

                        <div class="space-y-4">
                            <div class="text-neutral-200 font-medium">{{ __('How will we notify you?') }}</div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="space-y-1">
                                    <label class="inline-flex items-center gap-2">
                                        <input type="checkbox" name="notify_email" value="1" class="rounded border-neutral-700 bg-neutral-900 accent-emerald-500" checked>
                                        <span class="text-sm text-white">{{ __('E-mail') }}</span>
                                    </label>
                                    <div class="text-xs text-neutral-400">
                                        {{ auth()->user()->email ?? 'you@example.com' }}
                                    </div>
                                    <div class="mt-2 inline-flex items-center gap-2 rounded-md bg-[#1a1f2e] border border-neutral-700 px-2 py-1 text-xs text-neutral-300">
                                        <span class="inline-flex h-5 w-5 items-center justify-center rounded bg-[#253047] text-neutral-300">⟳</span>
                                        <span>{{ __('No delay, no repeat') }}</span>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <label class="inline-flex items-center gap-2">
                                        <input type="checkbox" name="notify_sms" value="1" class="rounded border-neutral-700 bg-neutral-900 accent-emerald-500">
                                        <span class="text-sm text-white">{{ __('SMS message') }}</span>
                                    </label>
                                    <div class="text-xs"><a href="#" class="text-emerald-500 underline">{{ __('Add phone number') }}</a></div>
                                    <div class="mt-2 inline-flex items-center gap-2 rounded-md bg-[#1a1f2e] border border-neutral-700 px-2 py-1 text-xs text-neutral-300">
                                        <span class="inline-flex h-5 w-5 items-center justify-center rounded bg-[#253047] text-neutral-300">⟳</span>
                                        <span>{{ __('No delay, no repeat') }}</span>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <label class="inline-flex items-center gap-2">
                                        <input type="checkbox" name="notify_voice" value="1" class="rounded border-neutral-700 bg-neutral-900 accent-emerald-500">
                                        <span class="text-sm text-white">{{ __('Voice call') }}</span>
                                    </label>
                                    <div class="text-xs"><a href="#" class="text-emerald-500 underline">{{ __('Add phone number') }}</a></div>
                                    <div class="mt-2 inline-flex items-center gap-2 rounded-md bg-[#1a1f2e] border border-neutral-700 px-2 py-1 text-xs text-neutral-300">
                                        <span class="inline-flex h-5 w-5 items-center justify-center rounded bg-[#253047] text-neutral-300">⟳</span>
                                        <span>{{ __('No delay, no repeat') }}</span>
                                    </div>
                                </div>
                                <div class="space-y-1">
                                    <label class="inline-flex items-center gap-2">
                                        <input type="checkbox" name="notify_push" value="1" class="rounded border-neutral-700 bg-neutral-900 accent-emerald-500">
                                        <span class="text-sm text-white">{{ __('Push') }}</span>
                                    </label>
                                    <div class="text-xs text-neutral-400">
                                        {{ __('Download app for') }} <a href="#" class="text-emerald-500 underline">iOS</a> {{ __('or') }} <a href="#" class="text-emerald-500 underline">Android</a>
                                    </div>
                                    <div class="mt-2 inline-flex items-center gap-2 rounded-md bg-[#1a1f2e] border border-neutral-700 px-2 py-1 text-xs text-neutral-300">
                                        <span class="inline-flex h-5 w-5 items-center justify-center rounded bg-[#253047] text-neutral-300">⟳</span>
                                        <span>{{ __('No delay, no repeat') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-xs text-neutral-400">
                                {{ __('You can set up notifications for') }} <a href="{{ route('monitors.notifications') }}" class="text-emerald-500 underline">{{ __('Integrations & Team') }}</a> {{ __('in the specific tab and edit it later.') }}
                            </div>
                        </div>

                        <div class="rounded-lg bg-[#121826] border border-neutral-800 p-4 space-y-3">
                            <div class="text-neutral-200 font-medium">{{ __('Monitor interval') }}</div>
                            <div class="text-xs text-neutral-400">
                                {{ __('Your monitor will be checked every') }}
                                <span id="mi-label" class="text-blue-400">5 minutes</span>.
                                {{ __('We recommend to use at least 1-minute checks') }}
                                <a href="#" class="text-emerald-500 underline">{{ __('available in paid plans') }}</a>
                            </div>
                            <input id="mi-range" type="range" min="0" max="6" step="1" value="2" class="w-full h-2 rounded bg-[#253047] accent-blue-600">
                            <div class="grid grid-cols-7 gap-2 text-xs text-neutral-400">
                                <div>30s</div>
                                <div>1m</div>
                                <div>5m</div>
                                <div>30m</div>
                                <div>1h</div>
                                <div>12h</div>
                                <div>24h</div>
                            </div>
                            <input type="hidden" name="interval" id="mi-value" value="5m">
                        </div>

                        <div class="rounded-lg bg-[#121826] border border-neutral-800 p-4 space-y-2">
                            <div class="flex items-center justify-between">
                                <div class="text-neutral-200 font-medium">{{ __('Region to monitor from') }}</div>
                                <div class="text-[11px] text-neutral-400">{{ __('Available only in Solo, Team and Enterprise.') }} <a href="#" class="text-emerald-500 underline">{{ __('Upgrade now') }}</a></div>
                            </div>
                            <select name="region" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white">
                                <option value="auto">{{ __('Default (auto-select by UptimeRobot)') }}</option>
                            </select>
                        </div>

                        <details class="rounded-lg bg-[#121826] border border-neutral-800 p-4">
                            <summary class="cursor-pointer text-neutral-200 font-medium">{{ __('SSL certificate and Domain checks') }}</summary>
                            <div class="mt-2 inline-flex items-center gap-2 rounded-full bg-[#0d1320] border border-neutral-800 px-2 py-1 text-[11px] text-neutral-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2a5 5 0 00-5 5v3H6a2 2 0 00-2 2v7a2 2 0 002 2h12a2 2 0 002-2v-7a2 2 0 00-2-2h-1V7a5 5 0 00-5-5zm-3 8V7a3 3 0 016 0v3H9zm3 4a2 2 0 110 4 2 2 0 010-4z"/>
                                </svg>
                                <span>{{ __('Available only in Solo, Team and Enterprise.') }}</span>
                                <a href="#" class="text-emerald-500 underline">{{ __('Upgrade now') }}</a>
                            </div>
                            <div class="mt-4 grid grid-cols-1 sm:grid-cols-3 gap-2">
                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2 opacity-60">
                                    <span class="text-sm text-white">Check SSL errors</span>
                                    <input type="checkbox" name="check_ssl_errors" value="1" class="peer sr-only" disabled>
                                    <span class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 relative transition-colors cursor-pointer select-none">
                                        <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-500"></span>
                                    </span>
                                </label>
                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2 opacity-60">
                                    <span class="text-sm text-white">SSL expiry reminders</span>
                                    <input type="checkbox" name="ssl_expiry_reminders" value="1" class="peer sr-only" disabled>
                                    <span class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 relative transition-colors cursor-pointer select-none">
                                        <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-500"></span>
                                    </span>
                                </label>
                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2 opacity-60">
                                    <span class="text-sm text-white">Domain expiry reminders</span>
                                    <input type="checkbox" name="domain_expiry_reminders" value="1" class="peer sr-only" disabled>
                                    <span class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 relative transition-colors cursor-pointer select-none">
                                        <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-500"></span>
                                    </span>
                                </label>
                            </div>
                        </details>

                        <details class="rounded-lg bg-[#121826] border border-neutral-800 p-4">
                            <summary class="cursor-pointer text-neutral-200 font-medium">{{ __('Advanced settings') }}</summary>
                            <div class="mt-4 space-y-6">
                                <div class="space-y-3">
                                    <div class="text-neutral-200 font-medium">{{ __('Request timeout') }}</div>
                                    <div class="text-xs text-neutral-400">
                                        {{ __('The request timeout is') }}
                                        <span id="rt-label" class="text-blue-400">30 seconds</span>.
                                        {{ __('The shorter the timeout the earlier we mark website as down.') }}
                                    </div>
                                    <input id="rt-range" type="range" min="1" max="60" step="1" value="30" class="w-full h-2 rounded bg-[#253047] accent-blue-600">
                                    <div class="flex justify-between text-xs text-neutral-400">
                                        <div>1s</div>
                                        <div>15s</div>
                                        <div>30s</div>
                                        <div>45s</div>
                                        <div>60s</div>
                                    </div>
                                    <input type="hidden" id="rt-value" name="request_timeout" value="30s">
                                </div>

                                <div class="space-y-2">
                                    <div class="flex items-center gap-2 text-neutral-300">
                                        <span class="inline-flex h-4 w-4 items-center justify-center rounded bg-[#253047] text-neutral-300">🔒</span>
                                        <span class="text-sm">{{ __('Slow response time alert') }}</span>
                                        <a href="#" class="text-xs text-emerald-500 underline">{{ __('Upgrade to unlock') }}</a>
                                    </div>
                                    <div class="text-xs text-neutral-400">
                                        {{ __('You\'ll receive a notification if the response time exceeds your set threshold.') }}
                                        {{ __('Once it drops back below the threshold, you\'ll be notified again, and the incident will be marked as resolved.') }}
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <input type="number" name="slow_response_threshold" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white" value="1000" disabled>
                                        <span class="text-xs text-neutral-400">{{ __('milliseconds') }}</span>
                                    </div>
                                </div>

                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2">
                                    <span class="text-sm text-white">Follow redirections</span>
                                    <input type="checkbox" name="follow_redirects" value="1" class="peer sr-only" checked>
                                    <span data-switch class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 peer-checked:bg-emerald-600 relative transition-colors cursor-pointer select-none">
                                        <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-300 peer-checked:translate-x-5 transition-transform"></span>
                                    </span>
                                </label>

                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <label class="text-xs text-neutral-400">{{ __('Up HTTP status codes') }}</label>
                                        <div class="text-[11px] text-neutral-400">{{ __('Available only in Solo, Team and Enterprise.') }} <a href="#" class="text-emerald-500 underline">{{ __('Upgrade now') }}</a></div>
                                    </div>
                                    <div class="text-[11px] text-neutral-400 mb-2">{{ __('We will consider incident when we receive HTTP status code other than defined below.') }}</div>
                                    <div id="monitor-status-codes-tags" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 min-h-[42px] flex flex-wrap gap-2 items-center">
                                        <div class="status-tags-list flex flex-wrap gap-2 flex-1"></div>
                                        <input type="text" id="monitor-status-codes-input" class="flex-1 min-w-[120px] bg-transparent border-0 outline-none text-sm text-white placeholder-neutral-400" placeholder="Type and press Enter or comma" autocomplete="off">
                                    </div>
                                    <input type="hidden" name="expected_status_codes" id="monitor-status-codes-value" value="2xx, 3xx">
                                </div>

                                <div class="space-y-2">
                                    <div class="grid grid-cols-1 sm:grid-cols-[240px_1fr] gap-3 items-start">
                                        <div>
                                            <label class="text-xs text-neutral-400 mb-1 block">{{ __('Auth. type') }}</label>
                                            <select id="monitor-auth-type" name="auth_type" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white">
                                                <option value="none">{{ __('None') }}</option>
                                                <option value="basic">{{ __('Basic') }}</option>
                                            </select>
                                        </div>
                                        <div id="monitor-auth-creds" class="grid grid-cols-2 gap-3">
                                            <div>
                                                <label class="text-xs text-neutral-400 mb-1 block">{{ __('Auth. credentials') }}</label>
                                                <input id="monitor-auth-username" name="auth_username" type="text" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white" placeholder="{{ __('Username') }}">
                                            </div>
                                            <div class="relative">
                                                <label class="text-xs text-neutral-400 mb-1 block">&nbsp;</label>
                                                <input id="monitor-auth-password" name="auth_password" type="password" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 pr-10 text-sm text-white" placeholder="{{ __('Password') }}">
                                                <button type="button" id="monitor-auth-pass-toggle" class="absolute right-2 top-7 text-neutral-400 hover:text-neutral-200 text-sm">👁</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <label class="text-xs text-neutral-400">{{ __('HTTP method') }}</label>
                                        <div class="text-[11px] text-neutral-400">{{ __('Available only in Solo, Team and Enterprise.') }} <a href="#" class="text-emerald-500 underline">{{ __('Upgrade now') }}</a></div>
                                    </div>
                                    <div class="flex flex-wrap justify-around gap-2">
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-emerald-600 text-xs text-white cursor-pointer" data-value="HEAD">HEAD</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-pointer" data-value="GET">GET</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-pointer" data-value="POST">POST</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-pointer" data-value="PUT">PUT</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-pointer" data-value="PATCH">PATCH</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-pointer" data-value="DELETE">DELETE</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-pointer" data-value="OPTIONS">OPTIONS</button>
                                    </div>
                                    <input type="hidden" id="http-method-value" name="method" value="HEAD">
                                </div>

                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <label class="text-xs text-neutral-400">{{ __('Request body') }}</label>
                                        <div class="text-[11px] text-neutral-400">{{ __('Available only in Solo, Team and Enterprise.') }} <a href="#" class="text-emerald-500 underline">{{ __('Upgrade now') }}</a></div>
                                    </div>
                                    <textarea name="request_body" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white" rows="3" placeholder='{"key":"value"}' disabled></textarea>
                                    <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2">
                                        <span class="text-sm text-neutral-300">Send as JSON (application/json)</span>
                                        <input type="checkbox" name="request_body_json" value="1" class="peer sr-only" disabled>
                                        <span class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 relative transition-colors cursor-pointer select-none">
                                            <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-300"></span>
                                        </span>
                                    </label>
                                    <div class="text-[11px] text-neutral-400">{{ __('Data will be sent as a standard POST (application/x-www-form-urlencoded) unless you choose the JSON option.') }}</div>
                                </div>

                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <label class="text-xs text-neutral-400">{{ __('Request headers') }}</label>
                                        <div class="inline-flex items-center gap-2 rounded-full bg-[#0d1320] border border-neutral-800 px-2 py-1 text-[11px] text-neutral-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 text-amber-400" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M12 2a5 5 0 00-5 5v3H6a2 2 0 00-2 2v7a2 2 0 002 2h12a2 2 0 002-2v-7a2 2 0 00-2-2h-1V7a5 5 0 00-5-5zm-3 8V7a3 3 0 016 0v3H9zm3 4a2 2 0 110 4 2 2 0 010-4z"/>
                                            </svg>
                                            <span>{{ __('Available only in Solo, Team and Enterprise.') }}</span>
                                            <a href="#" class="text-emerald-500 underline">{{ __('Upgrade now') }}</a>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-[1fr_1fr_40px] gap-2">
                                        <input name="header_name[]" class="rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white" placeholder="X-Header-Name" disabled>
                                        <input name="header_value[]" class="rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white" placeholder="Value" disabled>
                                        <button type="button" class="inline-flex items-center justify-center rounded-lg bg-neutral-800 hover:bg-neutral-700 text-red-400 px-2 py-2 cursor-pointer" disabled>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M9 3h6a1 1 0 011 1v2h4v2h-1l-1 12a2 2 0 01-2 2H8a2 2 0 01-2-2L5 8H4V6h4V4a1 1 0 011-1zm2 3h2V5h-2v1zm-1 5h2v8H10v-8zm4 0h2v8h-2v-8z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </details>
                    </div>
                </form>
            </div>

            <div id="tab-team" class="space-y-6 hidden lg:order-1 order-2" role="tabpanel" aria-labelledby="tablink-team">
                <div class="text-neutral-200 font-medium">{{ __('Add single monitor.') }}</div>
                <div class="rounded-xl !bg-panel border border-neutral-800 p-5 space-y-4">
                    <div class="rounded-lg bg-[#121826] border border-neutral-800 p-4 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="text-neutral-200 font-medium">{{ __('Notify team members.') }}</div>
                            <button type="button" class="rounded-md bg-[#1a1f2e] border border-neutral-700 px-3 py-1 text-xs text-white">{{ __('Manage') }}</button>
                        </div>
                        <div class="rounded-md bg-[#0d1320] border border-neutral-800 p-6 text-center">
                            <div class="text-neutral-300">
                                <span class="text-emerald-500 font-bold">{{ __('Notify') }}</span>
                                <span>{{ __('anyone via e-mail, SMS or voice call.') }}</span>
                            </div>
                            <div class="text-xs text-neutral-400 mt-2">
                                {{ __('Solve incidents faster, together. Keep every team member in the loop with their own access. Available in our Team and Enterprise plans.') }}
                            </div>
                            <div class="text-xs text-neutral-400">
                                {{ __('Notify anyone without sharing your account with Notify-only seats, available even in Solo plans (sold separately).') }}
                            </div>
                            <div class="mt-4">
                                <a href="#" class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-4 py-2 text-white text-sm">{{ __('See plans') }}</a>
                                <span class="text-xs text-neutral-400 ms-2">{{ __('Plans start at $7 / month. 10-day money-back guarantee.') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="rounded-lg bg-[#121826] border border-neutral-800 p-4 space-y-3">
                        <div class="flex items-center justify-between">
                            <div class="text-neutral-200 font-medium">{{ __('Connect integrations.') }}</div>
                            <button type="button" class="rounded-md bg-[#1a1f2e] border border-neutral-700 px-3 py-1 text-xs text-white">{{ __('Manage') }}</button>
                        </div>
                        <div class="rounded-md bg-[#0d1320] border border-neutral-800 p-6 text-center">
                            <div class="text-neutral-300">
                                <span class="text-emerald-500 font-bold">{{ __('Connect') }}</span>
                                <span>{{ __('any services you are using.') }}</span>
                            </div>
                            <div class="text-xs text-neutral-400 mt-2">
                                {{ __('Slack, MS Teams, Telegram, Webhooks... we got it all. Send up, down, SSL & domain alerts to your favorite service.') }}
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('monitors.notifications') }}" class="inline-flex items-center justify-center rounded-md bg-primary hover:bg-primary-hover px-4 py-2 text-white text-sm">{{ __('Manage integrations') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="tab-maintenance" class="space-y-6 hidden lg:order-1 order-2" role="tabpanel" aria-labelledby="tablink-maintenance">
                <div class="text-neutral-200 font-medium">{{ __('Add single monitor.') }}</div>
                <div class="rounded-xl !bg-panel border border-neutral-800 p-5 space-y-4">
                    <div class="rounded-lg bg-[#121826] border border-neutral-800 p-4 space-y-3">
                        <div class="text-neutral-200 font-medium">{{ __('Setup Maintenance windows.') }}</div>
                        <div class="rounded-md bg-[#0d1320] border border-neutral-800 p-6 text-center">
                            <div class="text-neutral-300">
                                <span>{{ __('Setup planned') }}</span>
                                <span class="text-emerald-500 font-bold">{{ __('maintenance') }}</span>
                                <span>{{ __('period.') }}</span>
                            </div>
                            <div class="text-xs text-neutral-400 mt-2">
                                {{ __('Unlock seamless maintenance planning! Keep your uptime untouched with scheduled regular or unplanned maintenance.') }}
                            </div>
                            <div class="text-xs text-neutral-400">
                                {{ __('During maintenance windows, no alerts are sent.') }}
                            </div>
                            <div class="mt-4">
                                <a href="#" class="inline-flex items-center justify-center rounded-full bg-emerald-600 px-4 py-2 text-white text-sm">{{ __('See plans') }}</a>
                                <span class="text-xs text-neutral-400 ms-2">{{ __('Plans start at $7 / month. 10-day money-back guarantee.') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-4 lg:order-2 order-1">
                <div class="rounded-xl !bg-panel border border-neutral-800 p-5" role="tablist" aria-orientation="vertical">
                    <button type="button" id="tablink-details" class="py-2 tab-link w-full text-left text-emerald-500 font-medium mb-2" data-tab="details" role="tab" aria-selected="true" aria-controls="tab-details">{{ __('Monitor details') }}</button>
                    <button type="button" id="tablink-team" class="py-2 tab-link w-full text-left text-neutral-400 mb-1" data-tab="team" role="tab" aria-selected="false" aria-controls="tab-team">{{ __('Integrations & Team') }}</button>
                    <button type="button" id="tablink-maintenance" class="py-2 tab-link w-full text-left text-neutral-400" data-tab="maintenance" role="tab" aria-selected="false" aria-controls="tab-maintenance">{{ __('Maintenance info') }}</button>
                </div>
            </div>

        </div>
        
        <!-- Bottom submit area -->
        <div class="border-t rounded-xl border-neutral-800 !bg-panel sticky bottom-0 left-0 right-0 z-10">
            <div class="mx-auto max-w-7xl p-4">
                <div class="flex items-center gap-4">
                    <flux:button type="button" variant="ghost" class="px-6 py-2.5 text-sm outline-none hover:outline-none !bg-[var(--color-danger)] text-white hover:bg-[var(--color-danger-hover)] border border-[var(--color-danger)]/30 hover:border-[var(--color-danger-hover)]/30 rounded-lg">
                        {{ __('Cancel') }}
                    </flux:button>
                    
                    <flux:button 
                        type="submit" 
                        form="monitor-create-form"
                        class="px-6 py-2.5 text-sm font-medium outline-none hover:outline-none border border-blue-600 hover:border-blue-700 rounded-lg !bg-blue-600 text-white hover:bg-blue-700"
                    >
                        {{ __('Create monitor') }}
                    </flux:button>
                </div>
            </div>
        </div>

    </div>

    @push('all_script')
    <script>
    // Clear caches first
    if (typeof clearCaches === 'function') {
        console.log('🧹 Clearing caches...');
        clearCaches();
    }

    console.log('🚀 Monitoring Create Page - JavaScript loaded');
    console.log('📊 DOM Ready State:', document.readyState);
    console.log('🔍 Checking for required elements...');

    // Small helper: safe text convert
    function toStr(v){ return v === undefined || v === null ? '' : String(v); }

    // Initialize a single dropdown (idempotent)
    function initializeDropdown(dropdown) {
        if (!dropdown || dropdown.dataset.ddInitialized === '1') return;
        try {
            console.log('🔽 Initializing dropdown:', dropdown);
            
            const trigger = dropdown.querySelector('.dd-trigger');
            const panel = dropdown.querySelector('.dd-panel');
            const currentTitle = dropdown.querySelector('.dd-current-title');
            const currentDesc = dropdown.querySelector('.dd-current-desc');
            const currentIcon = dropdown.querySelector('.dd-current-icon') || dropdown.querySelector('[data-dd-icon]');
            const chevron = dropdown.querySelector('[data-dd-chevron]');
            const hiddenInput = dropdown.parentElement ? dropdown.parentElement.querySelector('input[type="hidden"]') : null;

            console.log('🔽 Dropdown elements found:', {
                trigger: !!trigger,
                panel: !!panel,
                currentTitle: !!currentTitle,
                currentDesc: !!currentDesc,
                chevron: !!chevron,
                hiddenInput: !!hiddenInput
            });

            if (!trigger || !panel) {
                console.log('❌ Dropdown missing trigger or panel, marking as initialized');
                dropdown.dataset.ddInitialized = '1';
                return;
            }

            // mark initialized
            dropdown.dataset.ddInitialized = '1';
            console.log('✅ Dropdown marked as initialized');

            trigger.setAttribute('aria-expanded', 'false');
            trigger.setAttribute('aria-haspopup', 'true');
            panel.setAttribute('aria-hidden', 'true');

            function closeDropdown() {
                console.log('🔽 Closing dropdown:', dropdown);
                trigger.setAttribute('aria-expanded', 'false');
                panel.setAttribute('aria-hidden', 'true');
                panel.classList.remove('open');
                setTimeout(() => panel.classList.add('hidden'), 200);
                if (chevron) chevron.style.transform = 'rotate(0deg)';
            }

            function openDropdown() {
                console.log('🔽 Opening dropdown:', dropdown);
                // close other open dropdowns
                document.querySelectorAll('.dd').forEach(function(d){ 
                    if (d !== dropdown) {
                        const p = d.querySelector('.dd-panel'); 
                        if (p) { 
                            p.classList.remove('open'); 
                            p.classList.add('hidden'); 
                            d.querySelector('.dd-trigger')?.setAttribute('aria-expanded','false'); 
                            p.setAttribute('aria-hidden','true'); 
                        }
                    }
                });

                panel.classList.remove('hidden');
                setTimeout(() => panel.classList.add('open'), 10);
                trigger.setAttribute('aria-expanded', 'true');
                panel.setAttribute('aria-hidden', 'false');
                if (chevron) chevron.style.transform = 'rotate(180deg)';
            }

            function toggleDropdown() {
                const isExpanded = trigger.getAttribute('aria-expanded') === 'true';
                console.log('🔽 Toggling dropdown, isExpanded:', isExpanded);
                if (isExpanded) closeDropdown(); else openDropdown();
            }

            trigger.addEventListener('click', function(e){ 
                console.log('🔽 Dropdown trigger clicked:', trigger);
                e.preventDefault(); 
                e.stopPropagation(); 
                toggleDropdown(); 
            });

            // click options safely
            const options = dropdown.querySelectorAll('[data-dd-option]');
            console.log('🔽 Found dropdown options:', options.length);
            
            options.forEach(function(option){
                option.addEventListener('click', function(e){
                    console.log('🔽 Dropdown option clicked:', option);
                    try {
                        const value = toStr(this.getAttribute('data-value'));
                        const title = toStr(this.getAttribute('data-title'));
                        const description = toStr(this.getAttribute('data-description'));
                        const iconEl = this.querySelector('[data-dd-icon]') || this.querySelector('.dd-current-icon');
                        const icon = iconEl ? iconEl.innerHTML : '';

                        console.log('🔽 Option data:', { value, title, description });

                        if (currentTitle && title) currentTitle.textContent = title;
                        if (currentDesc && description) currentDesc.textContent = description;
                        if (currentIcon && icon) currentIcon.innerHTML = icon;

                        if (hiddenInput) {
                            hiddenInput.value = value;
                            console.log('🔽 Hidden input updated to:', value);
                        }
                    } catch (err) {
                        console.error('Error handling dropdown option:', err);
                    }
                    // close regardless
                    closeDropdown();
                });
            });
            
            console.log('✅ Dropdown initialization completed:', dropdown);
        } catch (err) {
            console.error('initializeDropdown error:', err);
        }
    }

    function initializeAllDropdowns() {
        try {
            const dropdowns = document.querySelectorAll('.dd');
            console.log('🔽 Found dropdowns to initialize:', dropdowns.length);
            
            dropdowns.forEach(function(dd, index){ 
                console.log(`🔽 Processing dropdown ${index + 1}:`, dd);
                initializeDropdown(dd); 
            });
            
            console.log('✅ All dropdowns initialization completed');
        } catch (err) { 
            console.error('initializeAllDropdowns error:', err); 
        }
    }

    // Tabs - idempotent
    function initializeTabs(){
        try {
            const tabs = document.querySelectorAll('.tab-link');
            console.log('📑 Found tabs to initialize:', tabs.length);
            
            tabs.forEach(function(tab, index){
                if (tab.dataset.tabInit === '1') {
                    console.log(`📑 Tab ${index + 1} already initialized, skipping`);
                    return; 
                }
                
                console.log(`📑 Initializing tab ${index + 1}:`, tab);
                tab.dataset.tabInit = '1';
                
                tab.addEventListener('click', function(){
                    console.log('📑 Tab clicked:', tab);
                    const targetTab = this.getAttribute('data-tab');
                    
                    // Update tab buttons
                    document.querySelectorAll('.tab-link').forEach(function(t){ 
                        t.classList.remove('text-emerald-500','font-medium'); 
                        t.classList.add('text-neutral-400'); 
                        t.setAttribute('aria-selected','false'); 
                    });
                    
                    this.classList.remove('text-neutral-400'); 
                    this.classList.add('text-emerald-500','font-medium'); 
                    this.setAttribute('aria-selected','true');
                    
                    // Update tab panels
                    const panels = document.querySelectorAll('[role="tabpanel"]');
                    console.log('📑 Found tab panels:', panels.length);
                    
                    panels.forEach(function(panel){ 
                        if (panel.id === 'tab-'+targetTab) {
                            panel.classList.remove('hidden');
                            console.log('📑 Tab panel shown:', panel.id);
                        } else {
                            panel.classList.add('hidden');
                            console.log('📑 Tab panel hidden:', panel.id);
                        }
                    });
                    
                    console.log('📑 Tab switched to:', targetTab);
                });
            });
            
            console.log('✅ All tabs initialization completed');
        } catch (err) { 
            console.error('initializeTabs error:', err); 
        }
    }

    // Form elements (switches, method buttons, sliders) - FIXED
    function initializeFormElements(){
        try {
            console.log('🔄 Initializing form elements...');
            
            // Only initialize actual switch-style checkboxes (those with [data-switch] on the span)
            const switchSpans = document.querySelectorAll('[data-switch]');
            console.log('🔄 Found switch spans:', switchSpans.length);
            
            switchSpans.forEach(function(switchSpan, index){ 
                if (switchSpan.dataset.switchInit === '1') {
                    console.log(`🔄 Switch span ${index + 1} already initialized, skipping`);
                    return; 
                }
                
                console.log(`🔄 Initializing switch span ${index + 1}:`, switchSpan);
                switchSpan.dataset.switchInit = '1'; 
                
                // Find the checkbox that comes BEFORE the switch span (previous sibling)
                const checkbox = switchSpan.previousElementSibling;
                console.log('🔄 Found checkbox for switch span:', !!checkbox, checkbox?.type);
                
                if (checkbox && checkbox.type === 'checkbox') {
                    // Set initial state
                    console.log(`🔄 Setting initial state for switch ${index + 1}:`, checkbox.checked);
                    updateSwitchVisual(switchSpan, checkbox.checked);
                    
                    // Switch span click handler
                    switchSpan.addEventListener('click', function(){ 
                        console.log('🔄 Switch span clicked:', switchSpan);
                        if (!checkbox.disabled) {
                            checkbox.checked = !checkbox.checked; 
                            console.log('🔄 Checkbox toggled to:', checkbox.checked);
                            updateSwitchVisual(switchSpan, checkbox.checked);
                            checkbox.dispatchEvent(new Event('change')); 
                        } else {
                            console.log('🔄 Checkbox is disabled, ignoring click');
                        }
                    }); 
                    
                    // Checkbox change handler to keep visual in sync
                    checkbox.addEventListener('change', function() {
                        console.log('🔄 Checkbox changed via form:', checkbox.checked);
                        updateSwitchVisual(switchSpan, checkbox.checked);
                    });
                    
                    console.log('✅ Switch span event listener added');
                } else {
                    console.log('❌ No valid checkbox found for switch span');
                }
            });

            // Helper function to update switch visual state
            function updateSwitchVisual(switchEl, isChecked) {
                const dot = switchEl.querySelector('span:last-child');
                if (dot) {
                    if (isChecked) {
                        // Active state - dot on right, emerald background
                        dot.style.transform = 'translateX(1.25rem)'; // 20px = 1.25rem
                        switchEl.style.backgroundColor = '#10b981'; // emerald-600
                        dot.style.backgroundColor = '#ffffff'; // White dot
                        console.log('🔄 Switch set to ACTIVE - dot right, emerald bg');
                    } else {
                        // Inactive state - dot on left, gray background
                        dot.style.transform = 'translateX(0.125rem)'; // 2px = 0.125rem
                        switchEl.style.backgroundColor = '#374151'; // neutral-700
                        dot.style.backgroundColor = '#d1d5db'; // neutral-300
                        console.log('🔄 Switch set to INACTIVE - dot left, gray bg');
                    }
                    console.log('🔄 Switch visual updated:', isChecked, 'transform:', dot.style.transform);
                }
            }

            // HTTP method buttons
            const methodButtons = document.querySelectorAll('.http-method');
            console.log('🌐 Found HTTP method buttons:', methodButtons.length);
            
            methodButtons.forEach(function(btn, index){ 
                if (btn.dataset.httpInit==='1') {
                    console.log(`🌐 HTTP method ${index + 1} already initialized, skipping`);
                    return; 
                }
                
                console.log(`🌐 Initializing HTTP method ${index + 1}:`, btn);
                btn.dataset.httpInit='1'; 
                btn.addEventListener('click', function(){ 
                    console.log('🌐 HTTP method clicked:', btn);
                    
                    methodButtons.forEach(function(b){ 
                        b.classList.remove('bg-emerald-600'); 
                        b.classList.add('bg-[#253047]'); 
                    }); 
                    
                    btn.classList.remove('bg-[#253047]'); 
                    btn.classList.add('bg-emerald-600'); 
                    
                    const v = btn.getAttribute('data-value'); 
                    const input = document.getElementById('http-method-value'); 
                    console.log('🌐 Setting HTTP method value:', v, 'to input:', !!input);
                    
                    if (input) {
                        input.value = v; 
                        console.log('✅ HTTP method value updated:', v);
                    } else {
                        console.log('❌ HTTP method value input not found');
                    }
                }); 
                console.log('✅ HTTP method event listener added');
            });

            // sliders
            const miRange = document.getElementById('mi-range'); 
            const miLabel = document.getElementById('mi-label'); 
            const miValue = document.getElementById('mi-value');
            if (miRange && miLabel && miValue && !miRange.dataset.miInit) {
                miRange.dataset.miInit='1'; 
                const steps = ['30s','1m','5m','30m','1h','12h','24h']; 
                function fmt(v){ 
                    if (v.endsWith('s')) return v.replace('s',' seconds'); 
                    if (v.endsWith('m')) return v.replace('m',' minutes'); 
                    if (v.endsWith('h')) return v.replace('h',' hours'); 
                    return v; 
                } 
                function updateMi(){ 
                    const idx = parseInt(miRange.value,10); 
                    const v = steps[idx] || '5m'; 
                    miValue.value = v; 
                    miLabel.textContent = fmt(v); 
                } 
                updateMi(); 
                miRange.addEventListener('input', updateMi); 
            }

            const rtRange = document.getElementById('rt-range'); 
            const rtLabel = document.getElementById('rt-label'); 
            const rtValue = document.getElementById('rt-value');
            if (rtRange && rtLabel && rtValue && !rtRange.dataset.rtInit) {
                rtRange.dataset.rtInit='1'; 
                function updateRt(){ 
                    const seconds = parseInt(rtRange.value,10); 
                    const v = seconds+'s'; 
                    rtValue.value = v; 
                    rtLabel.textContent = seconds===1 ? '1 second' : seconds+' seconds'; 
                } 
                updateRt(); 
                rtRange.addEventListener('input', updateRt);
            }

            // auth
            const authType = document.getElementById('monitor-auth-type'); 
            const authUser = document.getElementById('monitor-auth-username'); 
            const authPass = document.getElementById('monitor-auth-password'); 
            const authPassToggle = document.getElementById('monitor-auth-pass-toggle');
            if (authType && authUser && authPass && !authType.dataset.authInit) {
                authType.dataset.authInit='1'; 
                function updateAuth(){ 
                    const isBasic = authType.value === 'basic'; 
                    authUser.disabled = !isBasic; 
                    authPass.disabled = !isBasic; 
                    if (!isBasic) { 
                        authUser.classList.add('bg-[#0d1320]', 'border-neutral-800', 'text-neutral-400'); 
                        authPass.classList.add('bg-[#0d1320]', 'border-neutral-800', 'text-neutral-400'); 
                    } else { 
                        authUser.classList.remove('bg-[#0d1320]', 'border-neutral-800', 'text-neutral-400'); 
                        authPass.classList.remove('bg-[#0d1320]', 'border-neutral-800', 'text-neutral-400'); 
                    } 
                }
                updateAuth(); 
                authType.addEventListener('change', updateAuth);
                if (authPassToggle) {
                    authPassToggle.addEventListener('click', function(){ 
                        if (authPass.disabled) return; 
                        authPass.type = authPass.type === 'password' ? 'text' : 'password'; 
                    });
                }
            }
        console.log('✅ Form elements initialization completed');
        } catch (err) { 
            console.error('initializeFormElements error:', err); 
        }
    }

    // Tags
    function initializeTags(){
        try {
            const tagsContainer = document.getElementById('monitor-tags-container'); 
            if (!tagsContainer || tagsContainer.dataset.tagsInit==='1') return; 
            tagsContainer.dataset.tagsInit='1';
            const tagsInput = document.getElementById('monitor-tags-input'); 
            const tagsValue = document.getElementById('monitor-tags-value'); 
            const tagsList = tagsContainer.querySelector('.tags-list'); 
            if (!tagsInput || !tagsValue || !tagsList) return;
            
            console.log('🏷️ Initializing tags functionality...');
            
            function updateHiddenValue(){ 
                const tags = Array.from(tagsList.querySelectorAll('.tag')).map(tag => tag.textContent.replace('×','').trim()); 
                tagsValue.value = tags.join(','); 
                console.log('🏷️ Tags updated:', tagsValue.value);
            }
            
            function createTag(text){ 
                const tag = document.createElement('span'); 
                tag.className = 'tag inline-flex items-center gap-1 rounded-full bg-[#253047] px-3 py-1 text-xs text-neutral-300'; 
                tag.innerHTML = `${text}<span class="tag-remove cursor-pointer hover:text-red-400 ml-1">×</span>`; 
                tag.querySelector('.tag-remove').addEventListener('click', function(){ 
                    tag.remove(); 
                    updateHiddenValue(); 
                }); 
                return tag; 
            }
            
            tagsInput.addEventListener('keydown', function(e){ 
                if (e.key === 'Enter' || e.key === ',') { 
                    e.preventDefault(); 
                    const value = this.value.trim(); 
                    if (value) { 
                        tagsList.appendChild(createTag(value)); 
                        this.value = ''; 
                        updateHiddenValue(); 
                    } 
                } 
            });
            
            tagsInput.addEventListener('blur', function(){ 
                const value = this.value.trim(); 
                if (value) { 
                    tagsList.appendChild(createTag(value)); 
                    this.value = ''; 
                    updateHiddenValue(); 
                } 
            });
            
            console.log('✅ Tags functionality initialized');
        } catch (err) { 
            console.error('initializeTags error:', err); 
        }
    }

    // Status Codes - similar to tags
    function initializeStatusCodes(){
        try {
            const statusContainer = document.getElementById('monitor-status-codes-tags'); 
            if (!statusContainer || statusContainer.dataset.statusInit==='1') return; 
            statusContainer.dataset.statusInit='1';
            const statusInput = document.getElementById('monitor-status-codes-input'); 
            const statusValue = document.getElementById('monitor-status-codes-value'); 
            const statusList = statusContainer.querySelector('.status-tags-list'); 
            if (!statusInput || !statusValue || !statusList) return;
            
            console.log('📊 Initializing status codes functionality...');
            
            // Initialize with default values
            const defaultValue = statusValue.value;
            if (defaultValue) {
                const codes = defaultValue.split(',').map(code => code.trim());
                codes.forEach(code => {
                    if (code) {
                        statusList.appendChild(createStatusCodeTag(code));
                    }
                });
            }
            
            function updateHiddenValue(){ 
                const codes = Array.from(statusList.querySelectorAll('.tag')).map(tag => tag.textContent.replace('×','').trim()); 
                statusValue.value = codes.join(','); 
                console.log('📊 Status codes updated:', statusValue.value);
            }
            
            function createStatusCodeTag(text){ 
                const tag = document.createElement('span'); 
                tag.className = 'tag inline-flex items-center gap-1 rounded-full bg-[#253047] px-3 py-1 text-xs text-neutral-300'; 
                tag.innerHTML = `${text}<span class="tag-remove cursor-pointer hover:text-red-400 ml-1">×</span>`; 
                tag.querySelector('.tag-remove').addEventListener('click', function(){ 
                    tag.remove(); 
                    updateHiddenValue(); 
                }); 
                return tag; 
            }
            
            statusInput.addEventListener('keydown', function(e){ 
                if (e.key === 'Enter' || e.key === ',') { 
                    e.preventDefault(); 
                    const value = this.value.trim(); 
                    if (value) { 
                        statusList.appendChild(createStatusCodeTag(value)); 
                        this.value = ''; 
                        updateHiddenValue(); 
                    } 
                } 
            });
            
            statusInput.addEventListener('blur', function(){ 
                const value = this.value.trim(); 
                if (value) { 
                    statusList.appendChild(createStatusCodeTag(value)); 
                    this.value = ''; 
                    updateHiddenValue(); 
                } 
            });
            
            console.log('✅ Status codes functionality initialized');
        } catch (err) { 
            console.error('initializeStatusCodes error:', err); 
        }
    }

    // close dropdown when clicking outside
    function bindDocumentClickClose(){
        if (document.body.dataset.ddBodyBind === '1') return; 
        document.body.dataset.ddBodyBind = '1';
        document.addEventListener('click', function(e){ 
            // Check if click is inside a dropdown
            const clickedInsideDropdown = e.target.closest('.dd');
            
            document.querySelectorAll('.dd').forEach(function(d){ 
                const trigger = d.querySelector('.dd-trigger'); 
                const panel = d.querySelector('.dd-panel'); 
                
                if (trigger && trigger.getAttribute('aria-expanded') === 'true') {
                    // If clicked outside the dropdown, close it
                    if (!clickedInsideDropdown || !d.contains(e.target)) {
                        panel.classList.remove('open'); 
                        setTimeout(() => panel.classList.add('hidden'), 200); 
                        trigger.setAttribute('aria-expanded','false'); 
                        panel.setAttribute('aria-hidden','true'); 
                        
                        const chevron = d.querySelector('[data-dd-chevron]');
                        if (chevron) chevron.style.transform = 'rotate(0deg)';
                    }
                } 
            }); 
        });
    }

    // Main initialization function
    function initAll(){ 
        console.log('🚀 Starting main initialization...');
        console.log('📊 Current DOM Ready State:', document.readyState);
        
        // Check if elements exist before initializing
        console.log('🔍 Pre-initialization element check:');
        console.log('🔽 Dropdowns:', document.querySelectorAll('.dd').length);
        console.log('📑 Tabs:', document.querySelectorAll('.tab-link').length);
        console.log('🔄 Switch spans:', document.querySelectorAll('[data-switch]').length);
        console.log('🏷️ Tags container:', !!document.getElementById('monitor-tags-container'));
        console.log('📊 Status codes container:', !!document.getElementById('monitor-status-codes-tags'));
        console.log('🔑 Auth type:', !!document.getElementById('monitor-auth-type'));
        
        initializeAllDropdowns(); 
        initializeTabs(); 
        initializeFormElements(); 
        initializeTags(); 
        initializeStatusCodes();
        bindDocumentClickClose(); 
        
        console.log('✅ Main initialization completed successfully');
    }

    // Initialize when DOM is fully loaded
    document.addEventListener('DOMContentLoaded', function(){ 
        console.log('📱 DOMContentLoaded event fired');
        console.log('📊 DOM Ready State on DOMContentLoaded:', document.readyState);
        try { 
            initAll(); 
            
            // Initialize again after a short delay to catch any dynamically added elements
            console.log('⏰ Scheduling delayed initialization (100ms)...');
            setTimeout(function() {
                console.log('⏰ Running delayed initialization...');
                initAll();
            }, 100);
            
            // And another one for good measure
            console.log('⏰ Scheduling final initialization (300ms)...');
            setTimeout(function() {
                console.log('⏰ Running final initialization...');
                initAll();
            }, 300);
        } catch(e) {
            console.error('❌ DOMContentLoaded initialization error:', e);
        }
    });

    // Also initialize on window load as backup
    window.addEventListener('load', function(){ 
        console.log('🖥️ Window load event fired');
        console.log('📊 DOM Ready State on window load:', document.readyState);
        try { 
            console.log('🔄 Running window load backup initialization...');
            initAll(); 
        } catch(e) {
            console.error('❌ Window load initialization error:', e);
        }
    });

    // Additional safety net - check if DOM is already loaded
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        console.log('⚡ DOM already loaded, running immediate initialization...');
        setTimeout(function() {
            console.log('⚡ Running immediate initialization...');
            initAll();
        }, 50);
    }

    // Expose for debugging
    window.MonitoringUI = { 
        initAll, 
        initializeDropdown,
        initializeTabs,
        initializeFormElements,
        initializeTags,
        initializeStatusCodes
    };
    </script>
    @endpush
</x-layouts.app>
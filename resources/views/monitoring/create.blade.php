<x-layouts.app :title="__('Create Monitor')">
    <div class="mx-auto max-w-7xl pb-24">

        <div class="flex items-center justify-between mb-4">
            <a href="{{ route('monitoring.index') }}" class="inline-flex items-center gap-1 rounded-full bg-[#1a1f2e] px-2.5 py-1 text-xs text-neutral-400 border border-neutral-700" wire:navigate>
                <span>‹</span>
                <span>{{ __('Monitoring') }}</span>
            </a>
        </div>

        <div class="relative grid grid-cols-1 lg:grid-cols-[1fr_260px] gap-6 mb-10">
            <div id="tab-details" class="space-y-6 lg:order-1 order-2" role="tabpanel" aria-labelledby="tablink-details">
                <div class="text-neutral-200 font-medium">{{ __('Add single monitor.') }}</div>
                
                <form id="monitor-create-form" class="space-y-6" 
                    action="{{ route('monitoring.store') }}" 
                    method="POST">
                    @csrf
                    
                    <!-- Monitor type selection - NOW INSIDE THE FORM -->
                    <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                        <flux:heading size="md" class="!text-white">{{ __('Monitor type') }}</flux:heading>
                        <div class="mt-3 ms-select relative">
                            <button type="button" class="ms-trigger w-full flex items-center gap-3 rounded-lg bg-[#1a1f2e] border border-neutral-800 px-4 py-3 text-left">
                                <span class="inline-flex h-8 w-8 items-center justify-center rounded bg-[#253047] text-neutral-300">HTTP</span>
                                <div class="flex-1">
                                    <div class="ms-label text-white font-medium">HTTP / website monitoring</div>
                                    <div class="text-xs text-neutral-400">Use HTTP(s) monitor to monitor your website, API endpoint, or anything running on HTTP.</div>
                                </div>
                                <span class="text-neutral-400">▾</span>
                            </button>
                            <div class="ms-panel absolute top-full left-0 mt-2 min-w-full rounded-xl border border-neutral-800 bg-[#1a1f2e] p-2 text-white shadow-lg hidden z-50">
                                <button type="button" class="ms-option w-full flex items-center gap-3 p-3 rounded-md hover:bg-gray-400 hover:text-gray-900" data-value="http" data-label="HTTP / website monitoring">
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded bg-[#253047] text-neutral-300">HTTP</span>
                                    <div class="flex-1 text-left">
                                        <div class="text-white text-sm font-medium">HTTP / website monitoring</div>
                                        <div class="text-xs text-neutral-400">Use HTTP(s) monitor to monitor your website, API endpoint, or anything running on HTTP.</div>
                                    </div>
                                </button>
                                <button type="button" class="ms-option w-full flex items-center gap-3 p-3 rounded-md hover:bg-gray-400 hover:text-gray-900" data-value="keyword" data-label="Keyword monitoring">
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded bg-[#253047] text-neutral-300">🔑</span>
                                    <div class="flex-1 text-left">
                                        <div class="text-white text-sm font-medium">Keyword monitoring</div>
                                        <div class="text-xs text-neutral-400">Check presence or absence of specific text in the response.</div>
                                    </div>
                                </button>
                                <button type="button" class="ms-option w-full flex items-center gap-3 p-3 rounded-md hover:bg-gray-400 hover:text-gray-900" data-value="ping" data-label="Ping monitoring">
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded bg-[#253047] text-neutral-300">📶</span>
                                    <div class="flex-1 text-left">
                                        <div class="text-white text-sm font-medium">Ping monitoring</div>
                                        <div class="text-xs text-neutral-400">Ensure your server or any device is always available.</div>
                                    </div>
                                </button>
                                <button type="button" class="ms-option w-full flex items-center gap-3 p-3 rounded-md hover:bg-gray-400 hover:text-gray-900" data-value="port" data-label="Port monitoring">
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded bg-[#253047] text-neutral-300">🧩</span>
                                    <div class="flex-1 text-left">
                                        <div class="text-white text-sm font-medium">Port monitoring</div>
                                        <div class="text-xs text-neutral-400">Monitor services via specific TCP ports.</div>
                                    </div>
                                </button>
                                <div class="w-full flex items-center gap-3 p-3 rounded-md bg-[#0d1320] opacity-60">
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded bg-[#253047] text-neutral-300">⏱</span>
                                    <div class="flex-1 text-left">
                                        <div class="text-sm text-white">Cron job / Heartbeat monitoring</div>
                                        <div class="text-xs text-neutral-400">Available only in Solo, Team and Enterprise. <a class="text-emerald-500 underline">Upgrade now</a></div>
                                    </div>
                                </div>
                                <div class="w-full flex items-center gap-3 p-3 rounded-md bg-[#0d1320] opacity-60">
                                    <span class="inline-flex h-8 w-8 items-center justify-center rounded bg-[#253047] text-neutral-300">🧾</span>
                                    <div class="flex-1 text-left">
                                        <div class="text-sm text-white">DNS monitoring</div>
                                        <div class="text-xs text-neutral-400">Available only in Solo, Team and Enterprise. <a class="text-emerald-500 underline">Upgrade now</a></div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="monitor_type" value="http">
                        </div>
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
                                <select class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white">
                                    <option>{{ __('Monitors (default)') }}</option>
                                </select>
                            </div>
                            <div>
                                <label class="text-xs text-neutral-200 mb-1 block">{{ __('Add tags') }}</label>
                                <div class="text-[11px] text-neutral-400 mb-2">{{ __('Tags will enable you to organise your monitors in a better way') }}</div>
                                <input type="text" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white" placeholder="{{ __('Click to add tag...') }}">
                            </div>
                        </div>
                        <div class="border-t border-neutral-800"></div>

                        <div class="space-y-4">
                            <div class="text-neutral-200 font-medium">{{ __('How will we notify you?') }}</div>
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="space-y-1">
                                    <label class="inline-flex items-center gap-2">
                                        <input type="checkbox" class="rounded border-neutral-700 bg-neutral-900 accent-emerald-500" checked>
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
                                        <input type="checkbox" class="rounded border-neutral-700 bg-neutral-900 accent-emerald-500">
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
                                        <input type="checkbox" class="rounded border-neutral-700 bg-neutral-900 accent-emerald-500">
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
                                        <input type="checkbox" class="rounded border-neutral-700 bg-neutral-900 accent-emerald-500">
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
                            <select disabled class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white">
                                <option>{{ __('Default (auto-select by UptimeRobot)') }}</option>
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
                                    <input type="checkbox" class="peer sr-only" disabled>
                                    <span class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 relative">
                                        <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-500"></span>
                                    </span>
                                </label>
                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2 opacity-60">
                                    <span class="text-sm text-white">SSL expiry reminders</span>
                                    <input type="checkbox" class="peer sr-only" disabled>
                                    <span class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 relative">
                                        <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-500"></span>
                                    </span>
                                </label>
                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2 opacity-60">
                                    <span class="text-sm text-white">Domain expiry reminders</span>
                                    <input type="checkbox" class="peer sr-only" disabled>
                                    <span class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 relative">
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
                                    <input id="rt-range" type="range" min="0" max="4" step="1" value="2" class="w-full h-2 rounded bg-[#253047] accent-blue-600">
                                    <div class="grid grid-cols-5 gap-2 text-xs text-neutral-400">
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
                                        <input type="number" class="w-full rounded-lg bg-[#0d1320] border border-neutral-800 px-3 py-2 text-sm text-neutral-400" value="1000" disabled>
                                        <span class="text-xs text-neutral-400">{{ __('milliseconds') }}</span>
                                    </div>
                                </div>

                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2">
                                    <span class="text-sm text-white">Follow redirections</span>
                                    <input type="checkbox" name="follow_redirects" class="peer sr-only" checked value="1">
                                    <span data-switch class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 relative transition-colors cursor-pointer select-none">
                                        <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-300 transition-transform"></span>
                                    </span>
                                </label>

                                <div>
                                    <div class="flex items-center justify-between mb-1">
                                        <label class="text-xs text-neutral-400">{{ __('Up HTTP status codes') }}</label>
                                        <div class="text-[11px] text-neutral-400">{{ __('Available only in Solo, Team and Enterprise.') }} <a href="#" class="text-emerald-500 underline">{{ __('Upgrade now') }}</a></div>
                                    </div>
                                    <div class="text-[11px] text-neutral-400 mb-2">{{ __('We will consider incident when we receive HTTP status code other than defined below.') }}</div>
                                    <input type="text" class="w-full rounded-lg bg-[#0d1320] border border-neutral-800 px-3 py-2 text-sm text-neutral-400" placeholder="2xx, 3xx" disabled>
                                </div>

                                <div class="space-y-2">
                                    <div class="grid grid-cols-1 sm:grid-cols-[240px_1fr] gap-3 items-start">
                                        <div>
                                            <label class="text-xs text-neutral-400 mb-1 block">{{ __('Auth. type') }}</label>
                                            <select id="auth-type" name="auth_type" class="w-full rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white">
                                                <option value="none">{{ __('None') }}</option>
                                                <option value="basic">{{ __('Basic') }}</option>
                                            </select>
                                        </div>
                                        <div id="auth-creds" class="grid grid-cols-2 gap-3">
                                            <div>
                                                <label class="text-xs text-neutral-400 mb-1 block">{{ __('Auth. credentials') }}</label>
                                                <input id="auth-username" name="auth_username" type="text" class="w-full rounded-lg bg-[#0d1320] border border-neutral-800 px-3 py-2 text-sm text-neutral-400" placeholder="{{ __('Username') }}" disabled>
                                            </div>
                                            <div class="relative">
                                                <label class="text-xs text-neutral-400 mb-1 block">&nbsp;</label>
                                                <input id="auth-password" name="auth_password" type="password" class="w-full rounded-lg bg-[#0d1320] border border-neutral-800 px-3 py-2 pr-10 text-sm text-neutral-400" placeholder="{{ __('Password') }}" disabled>
                                                <button type="button" id="auth-pass-toggle" class="absolute right-2 top-7 text-neutral-400 hover:text-neutral-200 text-sm">👁</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <label class="text-xs text-neutral-400">{{ __('HTTP method') }}</label>
                                        <div class="text-[11px] text-neutral-400">{{ __('Available only in Solo, Team and Enterprise.') }} <a href="#" class="text-emerald-500 underline">{{ __('Upgrade now') }}</a></div>
                                    </div>
                                    <div class="flex flex-wrap justify-around gap-2 opacity-60">
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-emerald-600 text-xs text-white cursor-not-allowed" data-value="HEAD" disabled>HEAD</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-not-allowed" data-value="GET" disabled>GET</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-not-allowed" data-value="POST" disabled>POST</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-not-allowed" data-value="PUT" disabled>PUT</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-not-allowed" data-value="PATCH" disabled>PATCH</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-not-allowed" data-value="DELETE" disabled>DELETE</button>
                                        <button type="button" class="http-method px-3 py-1.5 rounded bg-[#253047] text-xs text-white cursor-not-allowed" data-value="OPTIONS" disabled>OPTIONS</button>
                                    </div>
                                    <input type="hidden" id="http-method-value" name="method" value="HEAD">
                                </div>

                                <div class="space-y-2">
                                    <div class="flex items-center justify-between">
                                        <label class="text-xs text-neutral-400">{{ __('Request body') }}</label>
                                        <div class="text-[11px] text-neutral-400">{{ __('Available only in Solo, Team and Enterprise.') }} <a href="#" class="text-emerald-500 underline">{{ __('Upgrade now') }}</a></div>
                                    </div>
                                    <textarea class="w-full rounded-lg bg-[#0d1320] border border-neutral-800 px-3 py-2 text-sm text-neutral-400" rows="3" placeholder='{"key":"value"}' disabled></textarea>
                                    <label class="flex items-center justify-between rounded-lg bg-[#0d1320] border border-neutral-800 px-3 py-2">
                                        <span class="text-sm text-neutral-300">Send as JSON (application/json)</span>
                                        <input type="checkbox" class="peer sr-only" disabled>
                                        <span data-switch class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 relative select-none">
                                            <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-500"></span>
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
                                        <input class="rounded-lg bg-[#0d1320] border border-neutral-800 px-3 py-2 text-sm text-neutral-400" placeholder="X-Header-Name" disabled>
                                        <input class="rounded-lg bg-[#0d1320] border border-neutral-800 px-3 py-2 text-sm text-neutral-400" placeholder="Value" disabled>
                                        <button type="button" class="inline-flex items-center justify-center rounded-lg bg-neutral-800 text-red-400 px-2 py-2 cursor-not-allowed" disabled>
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
        
        <!-- Bottom submit area – replace the existing border-t rounded-xl block -->
        <div class="border-t rounded-xl border-neutral-800 !bg-panel sticky bottom-0 left-0 right-0 z-10">
            <div class="mx-auto max-w-7xl p-4">
                <div class="flex items-center justify-end gap-4">
                    <flux:button type="button" variant="ghost" class="px-6 py-2.5 text-sm">
                        {{ __('Cancel') }}
                    </flux:button>
                    
                    <flux:button 
                        type="submit" 
                        form="monitor-create-form"
                        class="bg-primary hover:bg-primary-hover px-6 py-2.5 text-white text-sm font-medium rounded-lg"
                    >
                        {{ __('Create monitor') }}
                    </flux:button>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var miRange = document.getElementById('mi-range');
            var miLabel = document.getElementById('mi-label');
            var miValue = document.getElementById('mi-value');
            if (miRange && miLabel && miValue) {
                var steps = ['30s','1m','5m','30m','1h','12h','24h'];
                function fmt(v) {
                    if (v.endsWith('s')) return v.replace('s', ' seconds');
                    if (v.endsWith('m')) return v.replace('m', ' minutes');
                    if (v.endsWith('h')) return v.replace('h', ' hours');
                    return v;
                }
                function updateMi() {
                    var idx = parseInt(miRange.value, 10);
                    var v = steps[idx] || '5m';
                    miValue.value = v;
                    miLabel.textContent = fmt(v);
                }
                updateMi();
                miRange.addEventListener('input', updateMi);
                miRange.addEventListener('change', updateMi);
            }
            var rtRange = document.getElementById('rt-range');
            var rtLabel = document.getElementById('rt-label');
            var rtValue = document.getElementById('rt-value');
            if (rtRange && rtLabel && rtValue) {
                var rtSteps = ['1s','15s','30s','45s','60s'];
                function updateRt() {
                    var idx = parseInt(rtRange.value, 10);
                    var v = rtSteps[idx] || '30s';
                    rtValue.value = v;
                    rtLabel.textContent = v.endsWith('s') ? v.replace('s', ' seconds') : v;
                }
                updateRt();
                rtRange.addEventListener('input', updateRt);
                rtRange.addEventListener('change', updateRt);
            }
            document.querySelectorAll('.ms-select').forEach(function (wrap) {
                var trigger = wrap.querySelector('.ms-trigger');
                var panel = wrap.querySelector('.ms-panel');
                var input = wrap.querySelector('input[type="hidden"]');
                var labelEl = trigger.querySelector('.ms-label');
                function closeAll() {
                    document.querySelectorAll('.ms-panel').forEach(function (p) { p.classList.add('hidden'); });
                }
                if (trigger && panel) {
                    panel.classList.add('hidden');
                    trigger.addEventListener('click', function (e) {
                        e.stopPropagation();
                        var open = !panel.classList.contains('hidden');
                        closeAll();
                        if (!open) panel.classList.remove('hidden');
                    });
                    panel.addEventListener('click', function (e) { e.stopPropagation(); });
                }
                wrap.querySelectorAll('.ms-option').forEach(function (opt) {
                    opt.addEventListener('click', function () {
                        var v = opt.getAttribute('data-value');
                        var lbl = opt.getAttribute('data-label');
                        if (input) input.value = v || '';
                        if (labelEl && lbl) labelEl.textContent = lbl;
                        if (panel) panel.classList.add('hidden');
                    });
                });
                document.addEventListener('click', closeAll);
                document.addEventListener('keydown', function (e) {
                    if (e.key === 'Escape') closeAll();
                });
            });
            document.querySelectorAll('[data-switch]').forEach(function (switchEl) {
                var input = switchEl.previousElementSibling;
                var knob = switchEl.querySelector('span');
                function updateSwitch() {
                    if (!input || !knob) return;
                    if (input.checked) {
                        switchEl.classList.remove('bg-neutral-700');
                        switchEl.classList.add('bg-primary');
                        knob.classList.add('translate-x-5');
                    } else {
                        switchEl.classList.add('bg-neutral-700');
                        switchEl.classList.remove('bg-primary');
                        knob.classList.remove('translate-x-5');
                    }
                }
                updateSwitch();
                if (input) {
                    input.addEventListener('change', updateSwitch);
                }
                switchEl.addEventListener('click', function (e) {
                    e.stopPropagation();
                    if (input) {
                        input.checked = !input.checked;
                        input.dispatchEvent(new Event('change', { bubbles: true }));
                    }
                });
            });
            document.querySelectorAll('.mi-opt').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    document.querySelectorAll('.mi-opt').forEach(function (b) {
                        b.classList.remove('bg-emerald-600');
                        b.classList.add('bg-[#253047]');
                    });
                    btn.classList.remove('bg-[#253047]');
                    btn.classList.add('bg-emerald-600');
                    var v = btn.getAttribute('data-value');
                    var input = document.getElementById('mi-value');
                    if (input) input.value = v;
                });
            });
            var authType = document.getElementById('auth-type');
            var authUser = document.getElementById('auth-username');
            var authPass = document.getElementById('auth-password');
            var authPassToggle = document.getElementById('auth-pass-toggle');
            function setDisabled(el, disabled) {
                if (!el) return;
                el.disabled = disabled;
                el.classList.toggle('bg-[#0d1320]', disabled);
                el.classList.toggle('border-neutral-800', disabled);
                el.classList.toggle('text-neutral-400', disabled);
                el.classList.toggle('bg-[#1a1f2e]', !disabled);
                el.classList.toggle('border-neutral-700', !disabled);
                el.classList.toggle('text-white', !disabled);
            }
            function updateAuth() {
                var isBasic = authType && authType.value === 'basic';
                setDisabled(authUser, !isBasic);
                setDisabled(authPass, !isBasic);
            }
            updateAuth();
            if (authType) authType.addEventListener('change', updateAuth);
            if (authPassToggle && authPass) {
                authPassToggle.addEventListener('click', function () {
                    if (authPass.disabled) return;
                    authPass.type = authPass.type === 'password' ? 'text' : 'password';
                });
            }
            document.querySelectorAll('.http-method').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    document.querySelectorAll('.http-method').forEach(function (b) {
                        b.classList.remove('bg-emerald-600');
                        b.classList.add('bg-[#253047]');
                    });
                    btn.classList.remove('bg-[#253047]');
                    btn.classList.add('bg-emerald-600');
                    var v = btn.getAttribute('data-value');
                    var input = document.getElementById('http-method-value');
                    if (input) input.value = v;
                });
            });
            var panes = {
                details: document.getElementById('tab-details'),
                team: document.getElementById('tab-team'),
                maintenance: document.getElementById('tab-maintenance')
            };
            function activateTab(name) {
                Object.keys(panes).forEach(function (k) {
                    if (!panes[k]) return;
                    if (k === name) {
                        panes[k].classList.remove('hidden');
                        panes[k].removeAttribute('hidden');
                    } else {
                        panes[k].classList.add('hidden');
                        panes[k].setAttribute('hidden', 'true');
                    }
                });
                document.querySelectorAll('.tab-link').forEach(function (el) {
                    var isActive = el.getAttribute('data-tab') === name;
                    el.classList.toggle('text-emerald-500', isActive);
                    el.classList.toggle('font-medium', isActive);
                    el.classList.toggle('text-neutral-400', !isActive);
                    el.setAttribute('aria-selected', isActive ? 'true' : 'false');
                });
            }
            var tabLinks = Array.prototype.slice.call(document.querySelectorAll('.tab-link'));
            document.querySelectorAll('.tab-link').forEach(function (el) {
                el.addEventListener('click', function () {
                    var name = el.getAttribute('data-tab') || 'details';
                    activateTab(name);
                });
                el.addEventListener('keydown', function (e) {
                    var idx = tabLinks.indexOf(el);
                    if (e.key === 'ArrowUp' || e.key === 'ArrowLeft') {
                        e.preventDefault();
                        var prev = tabLinks[Math.max(0, idx - 1)];
                        if (prev) {
                            prev.focus();
                            activateTab(prev.getAttribute('data-tab'));
                        }
                    } else if (e.key === 'ArrowDown' || e.key === 'ArrowRight') {
                        e.preventDefault();
                        var next = tabLinks[Math.min(tabLinks.length - 1, idx + 1)];
                        if (next) {
                            next.focus();
                            activateTab(next.getAttribute('data-tab'));
                        }
                    } else if (e.key === 'Home') {
                        e.preventDefault();
                        var first = tabLinks[0];
                        if (first) {
                            first.focus();
                            activateTab(first.getAttribute('data-tab'));
                        }
                    } else if (e.key === 'End') {
                        e.preventDefault();
                        var last = tabLinks[tabLinks.length - 1];
                        if (last) {
                            last.focus();
                            activateTab(last.getAttribute('data-tab'));
                        }
                    }
                });
            });
            activateTab('details');
        });
    </script>
</x-layouts.app>
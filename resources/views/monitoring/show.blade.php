<x-layouts.app :title="__('Monitoring') . ' - ' . $monitor->name">
    <div data-force-white>
        <div class="mx-auto max-w-7xl" data-force-white>
            <div class="flex items-center justify-between mb-4">
                <a href="{{ route('monitoring.index') }}" class="inline-flex items-center gap-1 rounded-full bg-[#1a1f2e] px-2.5 py-1 text-xs text-neutral-400 border border-neutral-700">
                    <span>‹</span>
                    <span>Monitoring</span>
                </a>
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center gap-3">
                    @php
                        $statusColor = $currentStatus == 'Up' ? 'emerald' : ($currentStatus == 'Down' ? 'red' : 'neutral');
                        $statusBgColor = $currentStatus == 'Up' ? 'emerald-600' : ($currentStatus == 'Down' ? 'red-600' : 'neutral-600');
                    @endphp
                    <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-{{ $statusBgColor }} relative">
                        @if($currentStatus == 'Up')
                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-500 opacity-75"></span>
                        @endif
                    </span>
                    <div>
                        <flux:heading size="xl" class="text-white leading-tight inline-flex items-center gap-2">
                            <span>{{ $monitor->name }}</span>
                            <span class="inline-flex items-center justify-center rounded bg-[#253047] px-1.5 py-0.5 text-xs text-neutral-300">↗</span>
                        </flux:heading>
                        <div class="text-xs text-neutral-400">{{ ucfirst($monitor->type) }} monitor for <a href="{{ $monitor->url }}" target="_blank" class="text-green-500 underline underline-offset-4 hover:text-green-400">{{ $monitor->url }}</a></div>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <div class="dd relative">
                        <flux:button variant="ghost" class="dd-trigger inline-flex items-center gap-2 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-sm text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">
                            <span class="inline-flex items-center gap-1">
                                <span class="inline-block w-4 h-4 rounded-full border border-neutral-600 text-neutral-300">⟳</span>
                                Test Notification
                            </span>
                        </flux:button>
                        <div class="dd-panel absolute top-full right-0 mt-2 min-w-[420px] rounded-xl border border-neutral-800 bg-[#1a1f2e] p-4 text-white shadow-lg hidden z-50">
                            <div class="flex items-center justify-between mb-2">
                                <div class="font-semibold text-white">Send test notifications.</div>
                                <button type="button" class="dd-close text-neutral-400 hover:text-gray-300">✖</button>
                            </div>
                            <div class="text-xs text-neutral-400">Attached people and integrations</div>
                            <div class="text-xs text-neutral-400 mt-1">
                                Can't see your alert contact here?
                                <a href="#" class="text-green-500 underline underline-offset-4 hover:text-green-400">Attach it here</a>
                            </div>
                            <div class="border-t border-neutral-800 my-3"></div>
                            <div class="text-xs text-neutral-400 mb-2">Options</div>
                            <div class="space-y-3">
                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2">
                                    <span class="text-sm text-white">Send to attached notify-only users</span>
                                    <input type="checkbox" class="peer sr-only">
                                    <span data-switch class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 peer-checked:bg-primary relative transition-colors cursor-pointer select-none">
                                        <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-300 peer-checked:translate-x-5 transition-transform"></span>
                                    </span>
                                </label>
                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2">
                                    <span class="text-sm text-white">Send to attached Integrations [0]</span>
                                    <input type="checkbox" class="peer sr-only">
                                    <span data-switch class="ms-2 inline-flex w-10 h-5 rounded-full bg-neutral-700 peer-checked:bg-primary relative transition-colors cursor-pointer select-none">
                                        <span class="absolute top-0.5 left-0.5 w-4 h-4 rounded-full bg-neutral-300 peer-checked:translate-x-5 transition-transform"></span>
                                    </span>
                                </label>
                            </div>
                            <button type="button" disabled class="mt-3 w-full rounded-md bg-gradient-to-r from-primary to-primary-hover opacity-60 px-4 py-2 text-sm text-white cursor-not-allowed">Send test notifications</button>
                        </div>
                    </div>
                    <flux:button variant="ghost" class="inline-flex items-center gap-2 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-sm text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">
                        <span class="inline-block w-4 h-4 border border-neutral-600 text-neutral-300">⏸</span>
                        <span>Pause</span>
                    </flux:button>
                    <flux:button variant="ghost" class="inline-flex items-center gap-2 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-sm text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">
                        <span class="inline-block w-4 h-4 border border-neutral-600 text-neutral-300">⚙</span>
                        <span>Edit</span>
                    </flux:button>
                    <div class="dd relative">
                        <flux:button variant="ghost" class="dd-trigger !px-2 !py-1 rounded-lg bg-[#1a1f2e] border border-neutral-700 text-white hover:bg-gray-400 hover:text-gray-900">⋮</flux:button>
                        <div class="dd-panel absolute top-full right-0 mt-2 min-w-[240px] rounded-xl border border-neutral-800 !bg-panel p-2 text-white shadow-lg hidden z-50">
                            <button class="w-full flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                <span>🛠</span><span>Edit monitor</span>
                            </button>
                            <button class="w-full flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                <span>👥</span><span>Integrations & team</span>
                            </button>
                            <button class="w-full flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                <span>🪛</span><span>Maintenance</span>
                            </button>
                            <button class="w-full flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                <span>🏷️</span><span>Add / Remove tags</span>
                            </button>
                            <button class="w-full flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                <span>📄</span><span>Add to status page</span>
                            </button>
                            <button class="w-full flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                <span>🧬</span><span>Clone monitor</span>
                            </button>
                            <div class="w-full flex items-center gap-2 px-3 py-2 rounded text-sm text-neutral-400">
                                <span>🗂</span><span>Move to Group</span>
                                <span class="ms-auto text-[10px] rounded bg-neutral-800 px-2 py-0.5 text-amber-400">Premium</span>
                            </div>
                            <button class="w-full flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                <span>⏸</span><span>Pause monitor</span>
                            </button>
                            <button class="w-full flex items-center gap-2 px-3 py-2 rounded text-sm hover:bg-gray-400 hover:text-gray-900">
                                <span>♻</span><span>Reset stats</span>
                            </button>
                            <div class="border-t border-neutral-800 my-1"></div>
                            <button class="w-full flex items-center gap-2 px-3 py-2 rounded text-sm bg-red-900/40 text-red-400 hover:bg-red-900/60 hover:text-red-300">
                                <span>🗑️</span><span>Delete monitor</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-[1fr_260px] gap-6">
                <div class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                            <div class="text-xs text-neutral-400 mb-2">Current status</div>
                            <div class="text-{{ $statusColor }}-500 font-bold">{{ $currentStatus }}</div>
                            <div class="text-xs text-neutral-400 mt-1">{{ $currentStatus == 'Up' ? 'Currently up for ' . $uptimeSince : ($currentStatus == 'Down' ? 'Currently down for ' . $uptimeSince : 'Not started yet') }}</div>
                        </div>
                        <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                            <div class="text-xs text-neutral-400 mb-2">Last check</div>
                            <div class="text-white font-bold">{{ $lastCheckTime }}</div>
                            <div class="text-xs text-neutral-400 mt-1">Checked every {{ $monitor->interval_seconds }} seconds</div>
                        </div>
                        <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-xs text-neutral-400">Last 24 hours</div>
                                <div class="text-xs text-neutral-400">{{ number_format($uptime24h, 2) }}%</div>
                            </div>
                            <div class="flex gap-0.5">
                                @foreach($uptimeBars as $barColor)
                                    <span class="w-1 h-3 rounded-sm bg-{{ $barColor }}"></span>
                                @endforeach
                            </div>
                            <div class="text-xs text-neutral-400 mt-2">
                                @php
                                    $incidents24h = 0; // You'll need to calculate this from your data
                                @endphp
                                {{ $incidents24h }} incidents
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <div class="text-xs text-neutral-400">Last 7 days</div>
                                <div class="text-emerald-500 font-bold">{{ number_format($uptime7d, 2) }}%</div>
                                <div class="text-xs text-neutral-400">0 incidents, 0m down</div>
                            </div>
                            <div>
                                <div class="text-xs text-neutral-400">Last 30 days</div>
                                <div class="text-emerald-500 font-bold">{{ number_format($uptime30d, 2) }}%</div>
                                <div class="text-xs text-neutral-400">0 incidents, 0m down</div>
                            </div>
                            <div>
                                <div class="text-xs text-neutral-400">Last 365 days</div>
                                <div class="text-neutral-400 font-bold">—.—%</div>
                                <div class="text-xs text-neutral-400">Unlock with paid plans</div>
                            </div>
                            <div class="dd relative">
                                <flux:button variant="ghost" class="dd-trigger w-full inline-flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white">
                                    <span class="inline-flex items-center gap-2">
                                        <span class="inline-flex h-5 w-5 items-center justify-center rounded bg-[#253047] text-neutral-300">📅</span>
                                        Pick a date range
                                    </span>
                                    <span class="text-neutral-400">▾</span>
                                </flux:button>
                                <div class="dd-panel absolute top-full right-0 mt-2 min-w-[640px] rounded-xl border border-neutral-800 bg-[#1a1f2e] p-4 text-white shadow-lg hidden z-50">
                                    <div class="flex items-center justify-between mb-3">
                                        <div class="font-semibold text-white">Pick a date range.</div>
                                        <button class="text-neutral-400 hover:text-gray-900">✖</button>
                                    </div>
                                    <div class="mb-3 grid grid-cols-6 gap-2">
                                        <button class="fb-preset rounded bg-[#253047] px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900" data-preset="this-week">This week</button>
                                        <button class="fb-preset rounded bg-[#253047] px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900" data-preset="last-week">Last week</button>
                                        <button class="fb-preset rounded bg-[#253047] px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900" data-preset="this-month">This month</button>
                                        <button class="fb-preset rounded bg-[#253047] px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900" data-preset="last-month">Last month</button>
                                        <button class="fb-preset rounded bg-[#253047] px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900" data-preset="entire-history">Entire history</button>
                                        <button class="fb-preset rounded bg-emerald-600 px-3 py-1.5 text-xs text-white hover:bg-emerald-500" data-preset="custom">Custom</button>
                                    </div>
                                    <div id="fb-date-range" date-rangepicker data-multiple-calendars="3" class="grid grid-cols-3 gap-4 text-center mb-4">
                                    </div>
                                    <div class="grid grid-cols-[1fr_auto_1fr] gap-3 items-center">
                                        <input id="fb-start-date" datepicker datepicker-format="dd/mm/yyyy" type="text" class="rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white placeholder-neutral-500" placeholder="05/01/2026" />
                                        <span class="text-neutral-500">—</span>
                                        <input id="fb-end-date" datepicker datepicker-format="dd/mm/yyyy" type="text" class="rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-2 text-sm text-white placeholder-neutral-500" placeholder="07/01/2026" />
                                    </div>
                                </div>
                                <div class="mt-3" data-force-white>
                                    <div class="text-xl font-bold text-emerald-500">{{ number_format($uptime24h, 2) }}%</div>
                                    <div class="text-xs text-neutral-400">0 incidents, 0m down</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-neutral-200 font-medium">Response time</div>
                            <flux:button variant="ghost" class="rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">Setup alerts for slow response times</flux:button>
                        </div>
                        <div class="rounded-md bg-[#1a1f2e] border border-neutral-800 p-4">
                            <canvas id="response-time-chart" class="w-full h-40"></canvas>
                        </div>
                        <div class="grid grid-cols-3 gap-4 mt-4">
                            <div>
                                <div class="text-neutral-400 text-xs">Average</div>
                                <div class="text-white font-bold">{{ is_numeric($avgResponse) ? $avgResponse . ' ms' : $avgResponse }}</div>
                            </div>
                            <div>
                                <div class="text-neutral-400 text-xs">Minimum</div>
                                <div class="text-emerald-500 font-bold">{{ is_numeric($minResponse) ? $minResponse . ' ms' : $minResponse }}</div>
                            </div>
                            <div>
                                <div class="text-neutral-400 text-xs">Maximum</div>
                                <div class="text-red-500 font-bold">{{ is_numeric($maxResponse) ? $maxResponse . ' ms' : $maxResponse }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">Latest incidents.</div>
                        @if(count($incidents) > 0)
                            <!-- Incident listing would go here -->
                            <div class="space-y-2">
                                @foreach($incidents as $incident)
                                    <div class="rounded-lg bg-[#1a1f2e] border border-neutral-800 p-3">
                                        <div class="flex items-center justify-between">
                                            <div class="text-sm text-white">{{ $incident['title'] }}</div>
                                            <div class="text-xs text-neutral-400">{{ $incident['time'] }}</div>
                                        </div>
                                        <div class="text-xs text-neutral-400 mt-1">{{ $incident['description'] }}</div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="rounded-lg bg-[#1a1f2e] border border-neutral-800 p-4 text-center">
                                <div class="text-amber-400 font-semibold">Good job, no incidents.</div>
                                <div class="text-xs text-neutral-400 mt-1">No incidents so far. Keep it up!</div>
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">Domain & SSL.</div>
                        <div class="space-y-4">
                            <div class="rounded-lg bg-[#1a1f2e] border border-neutral-800 p-3">
                                <div class="text-neutral-400 text-sm">Domain valid until</div>
                                <flux:button variant="ghost" class="mt-2 rounded-lg bg-[#253047] border border-neutral-700 px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">Unlock</flux:button>
                            </div>
                            <div class="rounded-lg bg-[#1a1f2e] border border-neutral-800 p-3">
                                <div class="text-neutral-400 text-sm">SSL certificate valid until</div>
                                <flux:button variant="ghost" class="mt-2 rounded-lg bg-[#253047] border border-neutral-700 px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">Unlock</flux:button>
                            </div>
                            <div class="rounded-lg bg-[#1a1f2e] border border-neutral-800 p-3">
                                <div class="text-neutral-400 text-xs">Available only in Solo, Team and Enterprise.</div>
                                <flux:button variant="ghost" class="mt-2 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">Upgrade now</flux:button>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">Next maintenance.</div>
                        <div class="text-xs text-neutral-400">No maintenance planned.</div>
                        <flux:button variant="ghost" class="mt-3 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">Set up maintenance</flux:button>
                    </div>

                    <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">Regions.</div>
                        <div class="rounded-lg bg-[#1a1f2e] border border-neutral-800 p-4 text-center">
                            <div class="inline-flex items-center gap-2 text-white font-medium">
                                <span class="inline-flex h-4 w-4 items-center justify-center rounded-full bg-emerald-600"></span>
                                North America
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">To be notified.</div>
                        <div class="text-xs text-neutral-400">No one is being alerted.</div>
                        <div class="grid grid-cols-1 gap-2 mt-3">
                            <flux:button variant="ghost" class="rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">Set up alerts for me</flux:button>
                            <flux:button variant="ghost" class="rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">Attach team or integration</flux:button>
                        </div>
                    </div>

                    <div class="rounded-xl !bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">Appears on.</div>
                        <div class="text-xs text-neutral-400">Status page</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // JavaScript for dropdowns remains the same
            document.querySelectorAll('.dd').forEach(function (dd) {
                var trigger = dd.querySelector(':scope > .dd-trigger');
                var panel = dd.querySelector(':scope > .dd-panel');
                var closeBtn = panel ? panel.querySelector('.dd-close') : null;
                if (panel) {
                    if (!dd.hasAttribute('data-open')) panel.classList.add('hidden');
                    panel.classList.add('z-50');
                    panel.addEventListener('click', function (e) { e.stopPropagation(); });
                }
                if (closeBtn && panel) {
                    closeBtn.addEventListener('click', function (e) {
                        e.stopPropagation();
                        panel.classList.add('hidden');
                    });
                }
                if (trigger) {
                    trigger.setAttribute('aria-expanded', panel && !panel.classList.contains('hidden') ? 'true' : 'false');
                    var chevron = trigger.querySelector('[data-dd-chevron]');
                    if (chevron) chevron.classList.toggle('rotate-180', panel && !panel.classList.contains('hidden'));
                    trigger.addEventListener('click', function (e) {
                        e.stopPropagation();
                        var isOpen = panel && !panel.classList.contains('hidden');
                        document.querySelectorAll('.dd').forEach(function (other) {
                            if (other !== dd) {
                                var op = other.querySelector(':scope > .dd-panel');
                                if (op) op.classList.add('hidden');
                            }
                        });
                        if (isOpen) {
                            if (panel) panel.classList.add('hidden');
                        } else {
                            if (panel) panel.classList.remove('hidden');
                        }
                        trigger.setAttribute('aria-expanded', isOpen ? 'false' : 'true');
                        var chevron2 = trigger.querySelector('[data-dd-chevron]');
                        if (chevron2) chevron2.classList.toggle('rotate-180', !isOpen);
                    });
                }

                if (panel && trigger) {
                    panel.querySelectorAll('[data-dd-option]').forEach(function (opt) {
                        opt.addEventListener('click', function (e) {
                            e.stopPropagation();
                            var title = opt.getAttribute('data-title');
                            var description = opt.getAttribute('data-description');
                            var icon = opt.querySelector('[data-dd-icon]');
                            var currentTitle = trigger.querySelector('.dd-current-title');
                            var currentDesc = trigger.querySelector('.dd-current-desc');
                            var currentIcon = trigger.querySelector('.dd-current-icon');

                            if (currentTitle && title) currentTitle.textContent = title;
                            if (currentDesc && description) currentDesc.textContent = description;
                            if (currentIcon && icon) {
                                currentIcon.className = icon.className + ' dd-current-icon';
                                currentIcon.innerHTML = icon.innerHTML;
                            }

                            panel.classList.add('hidden');
                            trigger.setAttribute('aria-expanded', 'false');
                            var chevron3 = trigger.querySelector('[data-dd-chevron]');
                            if (chevron3) chevron3.classList.remove('rotate-180');
                        });
                    });
                }
                dd.addEventListener('click', function (e) { e.stopPropagation(); });
            });

            document.querySelectorAll('.dd-panel label').forEach(function (label) {
                var input = label.querySelector('input[type="checkbox"]');
                var switchEl = label.querySelector('[data-switch]');
                if (input && switchEl) {
                    var knob = switchEl.querySelector('span');
                    function updateSwitch() {
                        if (!knob) return;
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
                    input.addEventListener('change', updateSwitch);
                    switchEl.addEventListener('click', function (e) {
                        e.stopPropagation();
                        input.checked = !input.checked;
                        input.dispatchEvent(new Event('change', { bubbles: true }));
                    });
                }
            });

            document.addEventListener('click', function () {
                document.querySelectorAll('.dd').forEach(function (dd) {
                    var p = dd.querySelector(':scope > .dd-panel');
                    if (p) p.classList.add('hidden');
                });
            });

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    document.querySelectorAll('.dd').forEach(function (dd) {
                        var p = dd.querySelector(':scope > .dd-panel');
                        if (p) p.classList.add('hidden');
                    });
                }
            });

            var drWrapper = document.getElementById('fb-date-range');
            var startInput = document.getElementById('fb-start-date');
            var endInput = document.getElementById('fb-end-date');
            if (window.DateRangePicker && drWrapper) {
                try {
                    new DateRangePicker(drWrapper, {
                        autohide: false,
                        format: 'dd/mm/yyyy',
                        multipleCalendars: true,
                        numberOfCalendars: 3,
                        weekStart: 1,
                        inline: true,
                    });
                } catch (e) {}
            }
            document.querySelectorAll('.fb-preset').forEach(function (btn) {
                btn.addEventListener('click', function () {
                    var preset = btn.getAttribute('data-preset');
                    var now = new Date();
                    function fmt(d) {
                        var dd = String(d.getDate()).padStart(2, '0');
                        var mm = String(d.getMonth() + 1).padStart(2, '0');
                        var yyyy = d.getFullYear();
                        return dd + '/' + mm + '/' + yyyy;
                    }
                    var start, end;
                    if (preset === 'this-week') {
                        var day = now.getDay();
                        var diff = (day + 6) % 7;
                        start = new Date(now);
                        start.setDate(now.getDate() - diff);
                        end = now;
                    } else if (preset === 'last-week') {
                        var day2 = now.getDay();
                        var diff2 = (day2 + 6) % 7;
                        var thisMonday = new Date(now);
                        thisMonday.setDate(now.getDate() - diff2);
                        end = new Date(thisMonday);
                        end.setDate(thisMonday.getDate() - 1);
                        start = new Date(thisMonday);
                        start.setDate(thisMonday.getDate() - 7);
                    } else if (preset === 'this-month') {
                        start = new Date(now.getFullYear(), now.getMonth(), 1);
                        end = now;
                    } else if (preset === 'last-month') {
                        start = new Date(now.getFullYear(), now.getMonth() - 1, 1);
                        end = new Date(now.getFullYear(), now.getMonth(), 0);
                    } else if (preset === 'entire-history') {
                        start = new Date(1970, 0, 1);
                        end = now;
                    } else if (preset === 'custom') {
                        return;
                    }
                    if (startInput && endInput) {
                        startInput.value = fmt(start);
                        endInput.value = fmt(end);
                    }
                    var panel = btn.closest('.dd-panel');
                    if (panel) panel.classList.add('hidden');
                });
            });

            // Dynamic chart data from PHP
            var chartEl = document.getElementById('response-time-chart');
            if (window.Chart && chartEl) {
                var labels = @json($chartLabels);
                var data = @json($chartData);
                
                // Convert PHP timestamps to JavaScript dates if needed
                // labels are already formatted strings from PHP
                
                new Chart(chartEl, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: data,
                            borderColor: '#34d399',
                            backgroundColor: '#34d399',
                            tension: 0.35,
                            pointRadius: 4,
                            pointHoverRadius: 6,
                            pointBorderColor: '#1a1f2e',
                            pointBackgroundColor: '#34d399'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                backgroundColor: '#111827',
                                titleColor: '#ffffff',
                                bodyColor: '#ffffff',
                                callbacks: {
                                    label: function (ctx) {
                                        return ctx.parsed.y + ' ms';
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                ticks: { color: '#ffffff' },
                                grid: { color: 'rgba(255,255,255,0.08)' }
                            },
                            y: {
                                beginAtZero: true,
                                suggestedMax: Math.max(...data) * 1.2 || 600,
                                ticks: { color: '#ffffff' },
                                grid: { color: 'rgba(255,255,255,0.08)' }
                            }
                        }
                    }
                });
            }
        });
    </script>
</x-layouts.app>
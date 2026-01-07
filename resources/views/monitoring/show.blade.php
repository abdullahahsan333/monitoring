<x-layouts.app :title="__('Monitoring')">
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
                    <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-emerald-600 relative">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-500 opacity-75"></span>
                    </span>
                    <div>
                        <flux:heading size="xl" class="text-white leading-tight inline-flex items-center gap-2">
                            <span>mail.google.com/</span>
                            <span class="inline-flex items-center justify-center rounded bg-[#253047] px-1.5 py-0.5 text-xs text-neutral-300">↗</span>
                        </flux:heading>
                        <div class="text-xs text-neutral-400">HTTP/S monitor for <a href="#" class="text-green-500 underline underline-offset-4 hover:text-green-400">https://mail.google.com/</a></div>
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
                        <div class="dd-panel absolute top-full right-0 mt-2 min-w-[360px] rounded-xl border border-neutral-800 bg-[#1a1f2e] p-4 text-white shadow-lg hidden z-50">
                            <div class="flex items-center justify-between mb-3">
                                <div class="font-semibold text-white">Send test notifications.</div>
                                <button class="text-neutral-400 hover:text-gray-900">✖</button>
                            </div>
                            <!-- Add data-force-white attribute to the integrations div for theme consistency -->
                            <div class="mb-3 text-xs text-neutral-400 data-force-white">Attached people and integrations</div>
                            <div class="space-y-3">
                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2">
                                    <span class="text-sm text-white">Send to attached notify-only users</span>
                                    <input type="checkbox" class="w-5 h-5 accent-gray-900" />
                                </label>
                                <label class="flex items-center justify-between rounded-lg bg-[#1a1f2e] border border-neutral-800 px-3 py-2">
                                    <span class="text-sm text-white">Send to attached Integrations [0]</span>
                                    <input type="checkbox" class="w-5 h-5 accent-gray-900" />
                                </label>
                            </div>
                            <button class="mt-4 w-full rounded-lg bg-indigo-600 px-4 py-2 text-sm text-white hover:bg-indigo-700">Send test notifications</button>
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
                        <div class="dd-panel absolute top-full right-0 mt-2 min-w-[240px] rounded-xl border border-neutral-800 bg-panel p-2 text-white shadow-lg hidden z-50">
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
                        <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                            <div class="text-xs text-neutral-400 mb-2">Current status</div>
                            <div class="text-emerald-500 font-bold">Up</div>
                            <div class="text-xs text-neutral-400 mt-1">Currently up for 20h:49m:46s</div>
                        </div>
                        <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                            <div class="text-xs text-neutral-400 mb-2">Last check</div>
                            <div class="text-white font-bold">2m, 39s ago</div>
                            <div class="text-xs text-neutral-400 mt-1">Checked every 5m</div>
                        </div>
                        <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                            <div class="flex items-center justify-between mb-2">
                                <div class="text-xs text-neutral-400">Last 24 hours</div>
                                <div class="text-xs text-neutral-400">100%</div>
                            </div>
                            <div class="flex gap-0.5">
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                                <span class="w-1 h-3 rounded-sm bg-emerald-500"></span>
                            </div>
                            <div class="text-xs text-neutral-400 mt-2">0 incidents, 0m down</div>
                        </div>
                    </div>

                    <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div>
                                <div class="text-xs text-neutral-400">Last 7 days</div>
                                <div class="text-emerald-500 font-bold">100%</div>
                                <div class="text-xs text-neutral-400">0 incidents, 0m down</div>
                            </div>
                            <div>
                                <div class="text-xs text-neutral-400">Last 30 days</div>
                                <div class="text-emerald-500 font-bold">100%</div>
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
                                <!-- Add data-force-white attribute to the stats div for theme consistency -->
                                <div class="mt-3" data-force-white>
                                    <div class="text-xl font-bold text-emerald-500">100%</div>
                                    <div class="text-xs text-neutral-400">0 incidents, 0m down</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl bg-panel border border-neutral-800 p-5">
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
                                <div class="text-white font-bold">407 ms</div>
                            </div>
                            <div>
                                <div class="text-neutral-400 text-xs">Minimum</div>
                                <div class="text-emerald-500 font-bold">394 ms</div>
                            </div>
                            <div>
                                <div class="text-neutral-400 text-xs">Maximum</div>
                                <div class="text-red-500 font-bold">419 ms</div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">Latest incidents.</div>
                        <div class="rounded-lg bg-[#1a1f2e] border border-neutral-800 p-4 text-center">
                            <div class="text-amber-400 font-semibold">Good job, no incidents.</div>
                            <div class="text-xs text-neutral-400 mt-1">No incidents so far. Keep it up!</div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4">
                    <div class="rounded-xl bg-panel border border-neutral-800 p-5">
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

                    <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">Next maintenance.</div>
                        <div class="text-xs text-neutral-400">No maintenance planned.</div>
                        <flux:button variant="ghost" class="mt-3 rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">Set up maintenance</flux:button>
                    </div>

                    <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">Regions.</div>
                        <div class="rounded-lg bg-[#1a1f2e] border border-neutral-800 p-4 text-center">
                            <div class="inline-flex items-center gap-2 text-white font-medium">
                                <span class="inline-flex h-4 w-4 items-center justify-center rounded-full bg-emerald-600"></span>
                                North America
                            </div>
                        </div>
                    </div>

                    <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">To be notified.</div>
                        <div class="text-xs text-neutral-400">No one is being alerted.</div>
                        <div class="grid grid-cols-1 gap-2 mt-3">
                            <flux:button variant="ghost" class="rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">Set up alerts for me</flux:button>
                            <flux:button variant="ghost" class="rounded-lg bg-[#1a1f2e] border border-neutral-700 px-3 py-1.5 text-xs text-white hover:bg-gray-400 hover:text-gray-900 transition-colors">Attach team or integration</flux:button>
                        </div>
                    </div>

                    <div class="rounded-xl bg-panel border border-neutral-800 p-5">
                        <div class="text-neutral-200 font-medium mb-3">Appears on.</div>
                        <div class="text-xs text-neutral-400">Status page</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.dd').forEach(function (dd) {
                var trigger = dd.querySelector(':scope > .dd-trigger');
                var panel = dd.querySelector(':scope > .dd-panel');
                if (panel) {
                    panel.classList.add('hidden');
                    panel.classList.add('z-50');
                    panel.addEventListener('click', function (e) { e.stopPropagation(); });
                }
                if (trigger) {
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
                    });
                }
                dd.addEventListener('click', function (e) { e.stopPropagation(); });
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

            var chartEl = document.getElementById('response-time-chart');
            if (window.Chart && chartEl) {
                var labels = ['Jan 7, 16:41', 'Jan 7, 17:11', 'Jan 7, 17:41'];
                var data = [407, 394, 419];
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
                                suggestedMax: 600,
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

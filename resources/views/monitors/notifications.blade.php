<x-layouts.app :title="__('Test Notifications')">
    <flux:modal name="monitors-modal" :show="true" focusable class="max-w-xl">
        <div class="w-full rounded-xl border border-neutral-200 !bg-panel p-6 shadow-sm">
            <div class="mb-4 flex items-center justify-between">
                <flux:heading size="xl">
                    <span class="text-white">{{ __('Test') }}</span>
                    <span class="ms-1">{{ __('notifications') }}</span>
                </flux:heading>
                <span class="text-xs text-white">{{ __('Step 2 of 4') }}</span>
            </div>

            <div class="space-y-4">
                <flux:text class="!text-white">
                    {{ __('We will send you an e-mail whenever your website goes down.') }}
                </flux:text>

                <div class="rounded-lg border border-neutral-200 p-4">
                    <div class="text-sm text-white">{{ __('Your e-mail') }}</div>
                    <div class="mt-1 font-medium text-white">{{ auth()->user()->email }}</div>
                    <div class="mt-1 text-xs text-white">
                        {{ __('You can invite your team members later on.') }}
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="text-xs text-white">
                        {{ __('We can also call, send you an SMS or you can connect your Slack, MS Teams or any service you already use.') }}
                    </div>
                    <div class="flex items-center">
                        <input type="checkbox" id="notif-active" class="hidden">
                        <flux:button id="notif-toggle" variant="primary" class="bg-neutral-700 hover:bg-neutral-600 !text-white" aria-pressed="false">
                            {{ __('Inactive — Send test e-mail notification') }}
                        </flux:button>
                    </div>
                </div>

                <div class="flex justify-end">
                    <flux:link :href="route('monitors.status')" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                        {{ __('Next') }}
                    </flux:link>
                </div>
            </div>

            <div class="mt-6 text-center">
                <div class="flex items-center justify-center gap-3">
                    <flux:link :href="route('monitoring.index')" class="text-sm" wire:navigate>{{ __('Skip') }}</flux:link>
                    <flux:link :href="route('monitoring.index')" class="text-sm opacity-60" wire:navigate>{{ __('Finish later') }}</flux:link>
                </div>
            </div>
        </div>
    </flux:modal>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var chk = document.getElementById('notif-active');
            var btn = document.getElementById('notif-toggle');
            function sync() {
                if (chk.checked) {
                    btn.classList.remove('bg-neutral-700','hover:bg-neutral-600');
                    btn.classList.add('bg-emerald-600','hover:bg-emerald-700');
                    btn.setAttribute('aria-pressed','true');
                    btn.textContent = '{{ __('Active — Send test e-mail notification') }}';
                } else {
                    btn.classList.remove('bg-emerald-600','hover:bg-emerald-700');
                    btn.classList.add('bg-neutral-700','hover:bg-neutral-600');
                    btn.setAttribute('aria-pressed','false');
                    btn.textContent = '{{ __('Inactive — Send test e-mail notification') }}';
                }
            }
            sync();
            chk.addEventListener('change', sync);
            btn.addEventListener('click', function (e) {
                e.preventDefault();
                chk.checked = !chk.checked;
                chk.dispatchEvent(new Event('change'));
            });
        });
    </script>
</x-layouts.app>

<x-layouts.app :title="__('Test Notifications')">
    <div class="flex w-full h-full items-center justify-center p-6">
        <div class="w-full max-w-xl rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="mb-4 flex items-center justify-between">
                <flux:heading size="xl">
                    <span class="text-neutral-200 dark:text-neutral-400">{{ __('Test') }}</span>
                    <span class="ms-1">{{ __('notifications') }}</span>
                </flux:heading>
                <span class="text-xs text-neutral-600 dark:text-neutral-400">{{ __('Step 2 of 4') }}</span>
            </div>

            <div class="space-y-4">
                <flux:text class="!text-neutral-700 dark:!text-neutral-300">
                    {{ __('We will send you an e-mail whenever your website goes down.') }}
                </flux:text>

                <div class="rounded-lg border border-neutral-200 p-4 dark:border-neutral-700 dark:bg-neutral-800">
                    <div class="text-sm text-neutral-500 dark:text-neutral-400">{{ __('Your e-mail') }}</div>
                    <div class="mt-1 font-medium text-neutral-900 dark:text-neutral-100">{{ auth()->user()->email }}</div>
                    <div class="mt-1 text-xs text-neutral-600 dark:text-neutral-400">
                        {{ __('You can invite your team members later on.') }}
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="text-xs text-neutral-600 dark:text-neutral-400">
                        {{ __('We can also call, send you an SMS or you can connect your Slack, MS Teams or any service you already use.') }}
                    </div>
                    <flux:button variant="primary">
                        {{ __('Send test e-mail notification') }}
                    </flux:button>
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
    </div>
</x-layouts.app>

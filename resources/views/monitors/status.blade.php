<x-layouts.app :title="__('Status Page')">
    <flux:modal name="monitors-modal" :show="true" focusable class="max-w-xl">
        <div class="w-full rounded-xl border border-neutral-200 bg-panel p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900">
            <div class="mb-4 flex items-center justify-between">
                <flux:heading size="xl">
                    <span class="text-white dark:text-neutral-400">{{ __('Get public') }}</span>
                    <span class="ms-1">{{ __('status page') }}</span>
                </flux:heading>
                <span class="text-xs text-white dark:text-neutral-400">{{ __('Step 3 of 4') }}</span>
            </div>

            <div class="space-y-5">
                <flux:text class="!text-white dark:!text-neutral-300">
                    {{ __('Showcase your uptime with your team or customers.') }}
                </flux:text>

                <div class="flex items-center justify-between rounded-lg border border-neutral-200 p-4 dark:border-neutral-700 dark:bg-neutral-800">
                    <div class="text-sm font-medium text-white dark:text-neutral-100">{{ __('Create status page') }}</div>
                    <flux:switch checked/>
                </div>

                <div class="rounded-lg border border-neutral-200 p-4 dark:border-neutral-700 dark:bg-neutral-800">
                    <div class="text-xs text-white dark:text-neutral-400">{{ __('Your status page will be available at') }}</div>
                    <div class="mt-1 font-medium text-blue-600 dark:text-blue-400">stats.example.com/QsMAunCnY</div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="text-xs text-white dark:text-neutral-400">
                        {{ __('Status page is fully customizable in settings.') }}
                    </div>
                    <flux:link :href="route('monitors.complete')" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                        {{ __('Finish setup') }}
                    </flux:link>
                </div>
            </div>

            <div class="mt-6 text-center">
                <flux:link :href="route('monitoring.index')" class="text-sm text-white" wire:navigate>{{ __('Skip') }}</flux:link>
            </div>
        </div>
    </flux:modal>
    <script></script>
</x-layouts.app>

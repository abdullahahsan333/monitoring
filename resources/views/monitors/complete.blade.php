<x-layouts.app :title="__('Setup Complete')">
    <div class="flex w-full h-full items-center justify-center p-6">
        <div class="w-full max-w-xl rounded-xl border border-neutral-200 bg-white p-6 shadow-sm dark:border-neutral-700 dark:bg-neutral-900 text-center">
            <div class="mb-4 flex items-center justify-between">
                <flux:heading size="xl" class="mx-auto">
                    <span class="text-neutral-200 dark:text-neutral-400">{{ __('Your monitor is') }}</span>
                    <span class="ms-1 text-green-600 dark:text-green-400">{{ __('ready') }}</span>
                    <span class="ms-1">{{ __('now') }}</span>
                </flux:heading>
                <span class="text-xs text-neutral-600 dark:text-neutral-400">{{ __('Step 4 of 4') }}</span>
            </div>

            <flux:text class="!text-neutral-700 dark:!text-neutral-300">
                {{ __('Congratulations! Your first monitor is ready. You can now add more monitors or tune your existing one with all the options available.') }}
            </flux:text>

            <div class="mt-6 flex items-center justify-center gap-3">
                <flux:link :href="route('monitoring.index')" class="inline-flex items-center justify-center rounded-full bg-green-600 px-5 py-2 text-white hover:bg-green-700">
                    {{ __('See all features') }}
                </flux:link>
            </div>

            <div class="mt-3">
                <flux:link :href="route('monitoring.index')" class="inline-flex items-center justify-center rounded-md bg-neutral-800 px-4 py-2 text-white hover:bg-neutral-700 dark:bg-neutral-700 dark:hover:bg-neutral-600">
                    {{ __('Nah, get me to dashboard already!') }}
                </flux:link>
            </div>
        </div>
    </div>
</x-layouts.app>

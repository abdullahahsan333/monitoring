<x-layouts.app :title="__('Setup Complete')">
    <flux:modal name="monitors-modal" :show="true" focusable class="max-w-xl">
        <div class="w-full rounded-xl border border-neutral-200 !bg-panel p-6 shadow-sm text-center">
            <div class="mb-4 flex items-center justify-between">
                <flux:heading size="xl" class="mx-auto">
                    <span class="text-white">{{ __('Your monitor is') }}</span>
                    <span class="ms-1 text-green-600">{{ __('ready') }}</span>
                    <span class="ms-1">{{ __('now') }}</span>
                </flux:heading>
                <span class="text-xs text-white">{{ __('Step 4 of 4') }}</span>
            </div>

            <flux:text class="!text-white">
                {{ __('Congratulations! Your first monitor is ready. You can now add more monitors or tune your existing one with all the options available.') }}
            </flux:text>

            <div class="mt-6 flex items-center justify-center gap-3">
                <flux:link :href="route('monitoring.index')" class="inline-flex items-center justify-center rounded-full bg-green-600 px-5 py-2 text-white hover:bg-green-700">
                    {{ __('See all features') }}
                </flux:link>
            </div>

            <div class="mt-3">
                <flux:link :href="route('monitoring.index')" class="inline-flex items-center justify-center rounded-md bg-neutral-800 px-4 py-2 text-white hover:bg-neutral-700">
                    {{ __('Nah, get me to dashboard already!') }}
                </flux:link>
            </div>
        </div>
    </flux:modal>
    <script></script>
</x-layouts.app>

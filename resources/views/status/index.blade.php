<x-layouts.app :title="__('Status Pages')">
    <div class="p-6">
        <div class="flex items-center justify-between">
            <flux:heading size="xl">{{ __('Status pages.') }}</flux:heading>
            <flux:link :href="route('monitors.status')" class="inline-flex items-center justify-center rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                {{ __('Create Status page') }}
            </flux:link>
        </div>

        <div class="mt-6 rounded-xl border border-neutral-700 bg-neutral-900 p-0 overflow-hidden">
            <div class="grid grid-cols-[1.6fr_1fr_1fr_160px] items-center gap-3 border-b border-neutral-800 px-4 py-3 text-xs text-neutral-400">
                <div>{{ __('Name') }}</div>
                <div>{{ __('Access level') }}</div>
                <div>{{ __('Status') }}</div>
                <div class="text-right">{{ __('Actions') }}</div>
            </div>

            <div class="grid grid-cols-[1.6fr_1fr_1fr_160px] items-center gap-3 px-4 py-3">
                <div class="flex items-center gap-3">
                    <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-emerald-600"></span>
                    <div>
                        <div class="text-neutral-100 font-medium">{{ __('Status page') }}</div>
                        <div class="text-xs text-neutral-400">{{ __('All monitors') }}</div>
                    </div>
                </div>

                <div class="text-neutral-300 flex items-center gap-2">
                    <span class="inline-flex h-5 w-5 items-center justify-center rounded bg-neutral-800 text-neutral-400">👥</span>
                    <span>{{ __('Public') }}</span>
                </div>

                <div class="text-emerald-500">{{ __('Published') }}</div>

                <div class="flex items-center justify-end gap-2">
                    <flux:link href="#" class="inline-flex items-center justify-center rounded-md bg-neutral-800 px-3 py-1.5 text-neutral-200 hover:bg-neutral-700">
                        {{ __('View') }}
                    </flux:link>

                    <flux:dropdown>
                        <flux:button variant="ghost" class="!px-3 !py-1.5">...</flux:button>
                        <flux:menu class="min-w-[220px] bg-black !text-white">
                            <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Monitors') }}</flux:menu.item>
                            <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Global settings') }}</flux:menu.item>
                            <flux:menu.item class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Un-publish') }}</flux:menu.item>
                            <flux:menu.separator />
                            <flux:menu.item class="!text-red-500 hover:bg-gray-400 hover:!text-gray-900">{{ __('Delete') }}</flux:menu.item>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

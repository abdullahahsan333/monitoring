<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-body">
        <flux:sidebar sticky stashable class="border-e border-zinc-200 bg-sidebar dark:border-zinc-700">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('monitoring.index') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="layout-grid" :href="route('monitoring.index')" :current="request()->routeIs('monitoring.*')" wire:navigate>{{ __('Monitoring') }}</flux:navlist.item>
                    <flux:navlist.item icon="book-open-text" :href="route('status.index')" :current="request()->routeIs('status.index')" wire:navigate>{{ __('Status Page') }}</flux:navlist.item>
                </flux:navlist.group>
            </flux:navlist>

            <flux:spacer />

            <!-- Desktop User Menu -->
            <flux:dropdown class="hidden lg:block" position="bottom" align="start">
                <flux:profile
                    :name="auth()->user()->name"
                    :initials="auth()->user()->initials()"
                    icon:trailing="chevrons-up-down"
                    data-test="sidebar-menu-button"
                />

                <flux:menu class="w-[220px] bg-black !text-white">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full hover:bg-gray-400 hover:!text-gray-900" data-test="logout-button">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>

            <div class="mt-auto w-full border-t border-neutral-800 p-2">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                            <span class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-700 text-white">
                                {{ auth()->user()->initials() }}
                            </span>
                        </span>
                        <span class="truncate text-sm text-neutral-200">{{ auth()->user()->name }}</span>
                    </div>
                    <flux:dropdown position="top" align="end">
                        <flux:button variant="ghost" class="!px-2 !py-1 !text-white">...</flux:button>
                        <flux:menu class="min-w-[240px] bg-black !text-white">
                            <flux:menu.item icon="user" class="text-white hover:bg-gray-400 hover:!text-gray-900">{{ __('Account details') }}</flux:menu.item>
                            <flux:menu.item icon="bell" class="text-white hover:bg-gray-400 hover:!text-gray-900">{{ __('Notifications & reports') }}</flux:menu.item>
                            <flux:menu.item icon="credit-card" class="text-white hover:bg-gray-400 hover:!text-gray-900">{{ __('Billing, plan & subscription') }}</flux:menu.item>
                            <flux:menu.item class="text-white hover:bg-gray-400 hover:!text-gray-900">
                                <div class="flex items-center gap-2">
                                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                        <path d="M7 3h10a2 2 0 0 1 2 2v14l-3-2-3 2-3-2-3 2V5a2 2 0 0 1 2-2z" />
                                        <path d="M9 8h6M9 12h6M9 16h4" />
                                    </svg>
                                    <span>{{ __('Invoices') }}</span>
                                </div>
                            </flux:menu.item>
                            <flux:menu.item icon="lock-closed" class="text-white hover:bg-gray-400 hover:!text-gray-900">{{ __('Security') }}</flux:menu.item>
                            <flux:menu.item icon="users" class="text-white hover:bg-gray-400 hover:!text-gray-900">{{ __('Affiliate') }}</flux:menu.item>
                            <flux:menu.item icon="link" class="text-white hover:bg-gray-400 hover:!text-gray-900">{{ __('Referral') }}</flux:menu.item>
                            <flux:menu.separator />
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full !text-red-500 hover:bg-gray-400 hover:!text-gray-900">
                                    {{ __('Log out') }}
                                </flux:menu.item>
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                </div>
            </div>
        </flux:sidebar>

        <!-- Mobile User Menu -->
        <flux:header class="lg:hidden">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

            <flux:spacer />

            <flux:dropdown position="top" align="end">
                <flux:profile
                    :initials="auth()->user()->initials()"
                    icon-trailing="chevron-down"
                />

                <flux:menu class="bg-black !text-white">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate class="hover:bg-gray-400 hover:!text-gray-900">{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full hover:bg-gray-400 hover:!text-gray-900" data-test="logout-button">
                            {{ __('Log Out') }}
                        </flux:menu.item>
                    </form>
                </flux:menu>
            </flux:dropdown>
        </flux:header>

        {{ $slot }}

        @fluxScripts
    </body>
</html>

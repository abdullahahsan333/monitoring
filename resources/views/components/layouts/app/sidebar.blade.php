<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        @include('partials.head')
    </head>
    <body class="min-h-screen bg-main-panel">
        <flux:sidebar sticky stashable class="border-e border-neutral-800 bg-sidebar-bg">
            <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

            <a href="{{ route('monitoring.index') }}" class="me-5 flex items-center space-x-2 rtl:space-x-reverse" wire:navigate>
                <x-app-logo />
            </a>

            <flux:navlist variant="outline">
                <flux:navlist.group :heading="__('Platform')" class="grid">
                    <flux:navlist.item icon="layout-grid" :href="route('monitoring.index')" :current="request()->routeIs('monitoring.*')" wire:navigate class="text-sidebar-text text-sidebar-icon hover:bg-[#131a25] hover:!text-white hover:[&_svg]:!text-sidebar-icon-hover active:text-sidebar-icon-active data-current:!border-0 data-current:!shadow-none hover:!border-0 {{ request()->routeIs('monitoring.*') ? '!bg-[#131a25] !text-white [&_svg]:!text-sidebar-icon-active' : '' }}">{{ __('Monitoring') }}</flux:navlist.item>
                    <flux:navlist.item icon="book-open-text" :href="route('status.index')" :current="request()->routeIs('status.index')" wire:navigate class="text-sidebar-text text-sidebar-icon hover:bg-[#131a25] hover:!text-white hover:[&_svg]:!text-sidebar-icon-hover active:text-sidebar-icon-active data-current:!border-0 data-current:!shadow-none hover:!border-0 {{ request()->routeIs('status.index') ? '!bg-[#131a25] !text-white [&_svg]:!text-sidebar-icon-active' : '' }}">{{ __('Status Page') }}</flux:navlist.item>
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

                <flux:menu class="w-[220px] bg-sidebar-dropdown">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-sidebar-dropdown text-sidebar-text"
                                >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold text-sidebar-text">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs text-sidebar-text/70">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate class="text-sidebar-text hover:bg-sidebar-dropdown-hover">{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full text-sidebar-text hover:bg-sidebar-dropdown-hover" data-test="logout-button">
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
                        <span class="truncate text-sm text-sidebar-text">{{ auth()->user()->name }}</span>
                    </div>
                    <flux:dropdown position="top" align="end">
                        <flux:button variant="ghost" class="!px-2 !py-1 text-sidebar-text">...</flux:button>
                        <flux:menu class="min-w-[280px] bg-sidebar-dropdown">
                            <flux:menu.item icon="user" class="text-sidebar-text hover:bg-sidebar-dropdown-hover">{{ __('Account details') }}</flux:menu.item>
                            <flux:menu.item icon="bell" class="text-sidebar-text hover:bg-sidebar-dropdown-hover">{{ __('Notifications & reports') }}</flux:menu.item>
                            <flux:menu.item icon="credit-card" class="text-sidebar-text hover:bg-sidebar-dropdown-hover">{{ __('Billing, plan & subscription') }}</flux:menu.item>
                            <flux:menu.item icon="recept" class="text-sidebar-text hover:bg-sidebar-dropdown-hover">{{ __('Invoices') }}</flux:menu.item>
                            <flux:menu.item icon="lock-closed" class="text-sidebar-text hover:bg-sidebar-dropdown-hover">{{ __('Security') }}</flux:menu.item>
                            <flux:menu.item icon="users" class="text-sidebar-text hover:bg-sidebar-dropdown-hover">{{ __('Affiliate') }}</flux:menu.item>
                            <flux:menu.item icon="link" class="text-sidebar-text hover:bg-sidebar-dropdown-hover">{{ __('Referral') }}</flux:menu.item>
                            <flux:menu.separator />
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full !text-red-500 hover:bg-sidebar-dropdown-hover">
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
                    icon:trailing="chevron-down"
                />

                <flux:menu class="bg-sidebar-dropdown">
                    <flux:menu.radio.group>
                        <div class="p-0 text-sm font-normal">
                            <div class="flex items-center gap-2 px-1 py-1.5 text-start text-sm">
                                <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                    <span
                                        class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black"
                                    >
                                        {{ auth()->user()->initials() }}
                                    </span>
                                </span>

                                <div class="grid flex-1 text-start text-sm leading-tight">
                                    <span class="truncate font-semibold text-sidebar-text">{{ auth()->user()->name }}</span>
                                    <span class="truncate text-xs text-sidebar-text">{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                        </div>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <flux:menu.radio.group>
                        <flux:menu.item :href="route('profile.edit')" icon="cog" wire:navigate class="text-sidebar-text hover:bg-sidebar-dropdown-hover">{{ __('Settings') }}</flux:menu.item>
                    </flux:menu.radio.group>

                    <flux:menu.separator />

                    <form method="POST" action="{{ route('logout') }}" class="w-full">
                        @csrf
                        <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full text-sidebar-text hover:bg-sidebar-dropdown-hover" data-test="logout-button">
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

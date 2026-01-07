<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('monitoring', 'monitoring.index')
    ->middleware(['auth', 'verified'])
    ->name('monitoring.index');

Route::view('status-page', 'status.index')
    ->middleware(['auth', 'verified'])
    ->name('status.index');

Route::view('monitors/create', 'monitors.create')
    ->middleware(['auth', 'verified'])
    ->name('monitors.create');

Route::view('monitors/notifications', 'monitors.notifications')
    ->middleware(['auth', 'verified'])
    ->name('monitors.notifications');

Route::view('monitors/status', 'monitors.status')
    ->middleware(['auth', 'verified'])
    ->name('monitors.status');

Route::view('monitors/complete', 'monitors.complete')
    ->middleware(['auth', 'verified'])
    ->name('monitors.complete');

Route::view('monitoring/single', 'monitoring.show')
    ->middleware(['auth', 'verified'])
    ->name('monitoring.show');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});

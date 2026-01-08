<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
// all controller
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\MonitorController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Allow GET/HEAD health checks for Boost browser logger endpoint
Route::match(['GET', 'HEAD'], '_boost/browser-logs', function () {
    return response()->noContent();
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('monitoring', [MonitoringController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('monitoring.index');

Route::get('monitoring/single', [MonitoringController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('monitoring.show');

Route::get('status-page', [StatusController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('status.index');

Route::get('monitors/create', [MonitorController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('monitors.create');

Route::get('monitors/notifications', [MonitorController::class, 'notifications'])
    ->middleware(['auth', 'verified'])
    ->name('monitors.notifications');

Route::get('monitors/status', [MonitorController::class, 'status'])
    ->middleware(['auth', 'verified'])
    ->name('monitors.status');

Route::get('monitors/complete', [MonitorController::class, 'complete'])
    ->middleware(['auth', 'verified'])
    ->name('monitors.complete');

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

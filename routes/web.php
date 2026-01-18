<?php

use App\Http\Controllers\Authentication\AuthenticationController;
use App\Http\Controllers\Authentication\SocialiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('guest');

Route::livewire('/dashboard', \App\Livewire\Logbook\Dashboard::class)->name('dashboard')->middleware('auth');

Route::prefix('logbook')->middleware('auth')->name('logbook.')->group(function () {
    Route::livewire('all-entries', \App\Livewire\Logbook\AllEntries::class)->name('all-entries');
    Route::livewire('entry/{logbookEntry}', \App\Livewire\Logbook\EntryDetails::class)->name('entry-details');
});

Route::prefix('vehicles')->middleware('auth')->name('vehicles.')->group(function () {
    Route::livewire('/vehicle/{vehicle}', \App\Livewire\Vehicles\VehicleDetails::class)->name('vehicle-details');
    Route::livewire('/', \App\Livewire\Vehicles\AllVehicles::class)->name('all-vehicles');
});

Route::get('/test', function () {
   dump(\App\Models\LogbookEntry::latest()->first()->start_location);
});

Route::prefix('user')->name('user.')->group(function () {
   Route::prefix('auth')->name('auth.')->group(function () {
       Route::post('logout', [AuthenticationController::class, 'logOut'])->name('logout');

       Route::livewire('login', \App\Livewire\User\Authentication\Login::class)->name('login');

       //Socialite
       Route::match(['get', 'post'], 'redirect/google', [SocialiteController::class, 'redirectGoogle'])->name('redirect.google')->middleware('guest');
       Route::match(['get', 'post'], 'callback/google', [SocialiteController::class, 'handleGoogleCallback'])->name('callback.google')->middleware('guest');
   });
});

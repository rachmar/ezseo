<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('auth')->group(function () {
    Route::get('dashboard', App\Http\Livewire\Pages\Dashboard::class)->name('dashboard');
    Route::get('companies', App\Http\Livewire\Pages\Companies\CompanyIndex::class)->name('companies');
    Route::get('phone-trackings', App\Http\Livewire\Pages\PhoneTrackings\PhoneTrackingIndex::class)->name('phone-trackings');
    Route::get('phone-trackings/{company}/reports', App\Http\Livewire\Pages\PhoneTrackings\PhoneTrackingReport::class)->name('report-phone-trackings');
});

require __DIR__.'/auth.php';

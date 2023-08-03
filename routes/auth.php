<?php

use App\Http\Livewire\Pages\Auth\Register;
use App\Http\Livewire\Pages\Auth\Authenticate;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', Authenticate::class);
    Route::get('login', Authenticate::class)->name('login');
    Route::get('register', Register::class)->name('register');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [Authenticate::class, 'destroy'])->name('logout');
});

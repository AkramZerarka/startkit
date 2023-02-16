<?php

use Illuminate\Support\Facades\Route;

Route::namespace("App\View\Pages")->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('login', Login::class)->name('login');
        Route::get('register', Register::class)->name('register');
        Route::get('logout', Logout::class)->name('logout');

        Route::namespace('Password')->prefix('password')->as('password.')->group(function () {
            Route::get('reset', Email::class)->name('request');
            Route::get('reset/{token}', Reset::class)->name('reset');
        });
    });
    Route::namespace("Backend")->group(function () {
        Route::get('dashboard', Dashboard::class)->name('dashboard');
    });
    Route::namespace("Frontend")->group(function () {
        Route::get('welcome', Welcome::class)->name('welcome');
    });
});

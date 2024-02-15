<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
Route::redirect('/', '/registration', 301);
Route::view('/registration', 'registration.index')->name('registration');

Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

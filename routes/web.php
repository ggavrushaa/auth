<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\User\SettingsController;
Route::redirect('/', '/registration', 301);

Route::view('/registration', 'registration.index')->name('registration');
Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');

Route::view('/login', 'login.index')->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::redirect('/user', '/user/settings')->name('user');
Route::get('/user/settings', [SettingsController::class, 'index'])->name('user.settings');

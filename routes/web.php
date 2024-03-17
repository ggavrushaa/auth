<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Controllers\User\Settings\ProfileController;
use App\Http\Controllers\User\Settings\PasswordController as UserPasswordController;
use App\Models\User;
use App\Notifications\Password\ConfirmNotification;

Route::redirect('/', '/registration', 301);


Route::middleware('guest')->group(function () {
    Route::view('/registration', 'registration.index')->name('registration');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
    
    Route::view('/login', 'login.index')->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::view('/password', 'password.index')->name('password');
    Route::post('/password', [PasswordController::class, 'store'])->name('password.store');
    Route::view('/password/confirm', 'password.confirm')->name('password.confirm');
    Route::view('/password/{code}', 'password.edit')->name('password.edit');
    Route::post('/password/{code}', [PasswordController::class, 'update'])->name('password.update');
});

Route::post('logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'online'])->group(function () {
    Route::redirect('/user', '/user/settings')->name('user');
    Route::get('/user/settings', [SettingsController::class, 'index'])->name('user.settings');
    Route::get('/user/settings/profile', [ProfileController::class, 'edit'])->name('user.settings.profile.edit');
    Route::post('/user/settings/profile', [ProfileController::class, 'update'])->name('user.settings.profile.update');
    Route::get('/user/settings/password', [UserPasswordController::class, 'edit'])->name('user.settings.password.edit');
    Route::post('/user/settings/password', [UserPasswordController::class, 'update'])->name('user.settings.password.update');
});

Route::get('/test', function () {
    return (new ConfirmNotification)
    ->toMail(User::query()->first());   
});
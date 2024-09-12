<?php


use App\Models\User;
use App\Models\Email;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\User\SettingsController;
use App\Http\Middleware\EmailConfirmedMiddleware;
use App\Notifications\Email\ConfirmEmailNotification;
use App\Http\Controllers\User\Settings\ProfileController;
use App\Notifications\Password\ConfirmPasswordNotification;
use App\Http\Controllers\User\Settings\PasswordController as UserPasswordController;

Route::redirect('/', '/registration', 301);


Route::middleware('guest')->group(function () {
    Route::view('/registration', 'registration.index')->name('registration');
    Route::post('/registration', [RegistrationController::class, 'store'])->name('registration.store');
    
    Route::view('/login', 'login.index')->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::view('/password', 'password.index')->name('password');
    Route::post('/password', [PasswordController::class, 'store'])->name('password.store');
    Route::view('/password/confirm', 'password.confirm')->name('password.confirm');
    Route::get('/password/{password:uuid}',  [PasswordController::class, 'edit'])->name('password.edit')->whereUuid('password');
    Route::post('/password/{password:uuid}', [PasswordController::class, 'update'])->name('password.update')->whereUuid('password');
});

Route::get('email/confirmation', [EmailController::class, 'index'])->name('email.confirmation')->middleware('auth');
Route::any('email/{email:uuid}/confirm', [EmailController::class, 'confirm'])->name('email.confirm')->whereUuid('email');
Route::post('email/{email:uuid}/send', [EmailController::class, 'send'])->name('email.send')->whereUuid('email');


Route::post('logout', [LogoutController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth', 'online'])->group(function () {
    Route::redirect('/user', '/user/settings')->name('user');
    Route::get('/user/settings', [SettingsController::class, 'index'])->name('user.settings');
    Route::get('/user/settings/profile', [ProfileController::class, 'edit'])->name('user.settings.profile.edit')->middleware(EmailConfirmedMiddleware::class);
    Route::post('/user/settings/profile', [ProfileController::class, 'update'])->name('user.settings.profile.update')->middleware(EmailConfirmedMiddleware::class);
    Route::view('/user/settings/email', 'user.settings.email.edit')->name('user.settings.email.edit');
    Route::get('/user/settings/password', [UserPasswordController::class, 'edit'])->name('user.settings.password.edit');
    Route::post('/user/settings/password', [UserPasswordController::class, 'update'])->name('user.settings.password.update');
});

Route::get('/social/{driver}/redirect', [SocialController::class, 'redirect'])->name('social.redirect');
Route::get('/social/{driver}/callback', [SocialController::class, 'callback'])->name('social.callback');



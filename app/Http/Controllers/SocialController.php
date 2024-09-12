<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Social;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\Social\SocialDriverEnum;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect(SocialDriverEnum $driver)
    {
        session(['social-back-url' => url()->previous()]);

        return Socialite::driver($driver->value)->redirect();
    }
    public function callback(SocialDriverEnum $driver)
    {
        try {
            $data = Socialite::driver($driver->value)->user();
        } catch (Exception $e) {
            report($e);
            return redirect()->to(session('social-back-url', '/login'));
        }

        $social = Social::query()->firstOrCreate([
            'driver' => $driver->value,
            'driver_user_id' => $data->getId(),
        ]);

        if (is_null($social->user_id)) {
            $user = User::query()->create(['password' => Str::random(12)]);
            $social->user()->associate($user)->save();
        }

        Auth::login($social->user);
        return redirect()->intended('/user');
    }
}

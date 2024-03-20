<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Password\StoreRequest;
use App\Http\Requests\Password\UpdateRequest;
use App\Notifications\Password\ConfirmNotification;

class PasswordController extends Controller
{
    public function store(StoreRequest $request)
    {
        $ip = $request->ip();

        $email = $request->input('email');

        $user = User::query()
            ->where(compact('email'))
            ->first();

        $password = Password::query()
            ->create(compact('ip', 'email') + ['user_id' => $user?->id]);

        $user?->notify(new ConfirmNotification($password));

        return to_route('password.confirm');
    }
    public function update(UpdateRequest $request, Password $password)
    {
        abort_unless($password->user_id, 404);

        /** @var User */
        $user = $password->user;
        $user->updatePassword($request->input('password'));

        Auth::login($user);

       return to_route('user');
    }

    public function edit(Password $password)
    {
        abort_unless($password->user_id, 404);

        return view('password.edit', compact('password'));
    }
}

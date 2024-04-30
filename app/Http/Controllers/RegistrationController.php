<?php

namespace App\Http\Controllers;

use App\Events\User\UserCreatedEvent;
use App\Http\Requests\Registration\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function store(StoreRequest $request)
    {
        $data = $request->only([
            'first_name',
            'email',
            'password',
        ]);

        $user = User::query()->create($data);

        event(new UserCreatedEvent($user));

        Auth::login($user);

        return redirect()->intended('/user');
    }
}

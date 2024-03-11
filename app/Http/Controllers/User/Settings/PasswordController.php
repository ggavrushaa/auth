<?php

namespace App\Http\Controllers\User\Settings;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use LaravelLang\Publisher\Console\Update;
use App\Http\Requests\User\Settings\Password\UpdateRequest;

class PasswordController extends Controller
{
    public function edit(Request $request)
    {
        /** @var User */
        $user = $request->user();

        return view('user.settings.password.edit', [
            'user' => $user,
        ]);
    }

    public function update(UpdateRequest $request)
    {
        /** @var User */
        $user = $request->user();

        $user->updatePassword($request->input('password'));

        return to_route('user.settings');
    }
}

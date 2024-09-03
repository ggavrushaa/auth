<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Email;
use Illuminate\Http\Request;
use App\Enums\Email\EmailStatusEnum;
use App\Notifications\Email\ConfirmEmailNotification;

class EmailController extends Controller
{
    public function index(Request $request)
    {
         /** @var User  */
         $user = $request->user();

         abort_if($user->isEmailConfirmed(), 404);

         $email = Email::query()
            ->where('user_id', $user->id)
            ->where('status', EmailStatusEnum::pending)
            ->firstOrFail();
         
        return view('email.confirmation', compact('email'));
    }

    public function confirm(Request $request, Email $email)
    {
       abort_if($email->user->isEmailConfirmed(), 404);
       abort_unless($email->status->is(EmailStatusEnum::pending), 404);

       $validator = validator($request->only('code'), [
           'code' => 'required|string',
       ]);

       if ($validator->fails()) {
           return to_route('email.confirmation')
               ->withErrors(['code' => $validator->errors()->first()])
               ->withInput();
       }

       if($email->code !== $request->input('code')) {
            return to_route('email.confirmation')
                ->withErrors(['code' => 'Не верный код'])
                ->withInput();
       }

       $email->user->confirmEmail();
       $email->updateStatus(EmailStatusEnum::completed);

       return redirect()->intended('/user');
    }

    public function send(Request $request, Email $email)
    {

        if (session('email-confirmation-sent')) {
            return back();
        }

        /** @var User  */
        $user = $request->user();

        abort_if($email->user->isEmailConfirmed(), 404);
        abort_unless($email->status->is(EmailStatusEnum::pending), 404);

        $notification = new ConfirmEmailNotification($email);

        $email->user->notify($notification);

        session(['email-confirmation-sent' => now()]);

        return back();
    }
}

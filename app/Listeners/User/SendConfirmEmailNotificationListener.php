<?php

namespace App\Listeners\User;

use App\Enums\Email\EmailStatusEnum;
use App\Events\User\UserCreatedEvent;
use App\Models\Email;
use App\Notifications\Email\ConfirmEmailNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendConfirmEmailNotificationListener implements ShouldQueue
{
    public function handle(UserCreatedEvent $event): void
    {
        if ($event->user->isEmailConfirmed()) {
            return;
        }

        $email = Email::query()->create([
            'value' => $event->user->email,
            'user_id' => $event->user->id,
            'status' => EmailStatusEnum::pending,
        ]);

        $notification = new ConfirmEmailNotification($email);

        $event->user->notify($notification);
    }
}
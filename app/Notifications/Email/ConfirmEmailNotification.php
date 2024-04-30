<?php

namespace App\Notifications\Email;

use App\Models\User;
use App\Models\Email;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ConfirmEmailNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(private Email $email)
    {
        //
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(User $notifiable): MailMessage
    {
        $url = app_url("email/{$this->email->uuid}");

        return (new MailMessage)
                    ->subject('Подтверждение почты')
                    ->greeting('Здравствуйте!')
                    ->line('Для подверждения почты нажмите на кнопку ниже:')
                    ->action('Подтверждение почты', $url);
    }
}

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

    private bool $withLink = true;

    public function __construct(private Email $email)
    {
        //
    }

    public function withoutLink()
    {
        $this->withLink = false;
        return $this;
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(User $notifiable): MailMessage
    {
        
        $message = (new MailMessage)
            ->subject('Подтверждение почты')
            ->greeting('Здравствуйте!')
            ->line("Введите код подтверждения: {$this->email->code}");
        
        if ($this->withLink) {
            $url = app_url("email/{$this->email->uuid}/confirm?code={$this->email->code}");

            $message->line('Или нажмите на кнопку ниже:')
                ->action('Подтверждение почты', $url);
        }

        return $message;
    }
}
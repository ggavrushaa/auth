<?php

namespace App\Traits;

use App\Exceptions\GoogleConfirmationException;
use PragmaRX\Google2FA\Google2FA;

trait HasGoogleConfirmation
{
    public function googleConfirmationEnabled(): bool
    {
        return $this->google_confirmation;
    }

    public function enableGoogleConfirmation(): bool
    {
        $google2fa = new Google2FA();

        $secretKey = $google2fa->generateSecretKey();
        return $this->update(['google_confirmation_secret' => $secretKey]);
    }

    public function confirmGoogleConfirmation(string $code): void
    {
        $this->checkGoogleConfirmation($code);
        
        $this->update(['google_confirmation' => true]);
    }

    public function disableGoogleConfirmation(string $code): void
    {
        $this->checkGoogleConfirmation($code);
        
        $this->update([
            'google_confirmation' => false, 
            'google_confirmation_secret' => null,
        ]);
    }

    public function checkGoogleConfirmation(string $code): bool
    {
        $google2fa = new Google2FA();

        $success = $google2fa->verifyKey($this->google_confirmation_secret, $code);

        if (!$success) {
            throw new GoogleConfirmationException('Неверный код подтверждения');
        }   
        
        return true;
    }

    public function getQrCodeUrl()
    {
        $google2fa = new Google2FA();

        return $google2fa->getQRCodeUrl(
            config('app.name'),
            $this->email,
            $this->google_confirmation_secret
        );
    }

}
<?php

namespace Faridepc78\User\Notifications;

use Faridepc78\User\Mail\ResetPasswordRequestMail;
use Faridepc78\User\Services\VerifyCodeService;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ResetPasswordRequestNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $code = VerifyCodeService::generate();
        VerifyCodeService::store($notifiable->id, $code, 120);
        return (new ResetPasswordRequestMail($code))->to($notifiable->email);
    }
}

<?php

namespace Faridepc78\User\Notifications;

use Faridepc78\User\Mail\VerifyCodeMail;
use Faridepc78\User\Services\VerifyCodeService;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class VerifyMailNotification extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $code = VerifyCodeService::generate();
        VerifyCodeService::store($notifiable->id, $code, now()->addDay());
        return (new VerifyCodeMail($code))->to($notifiable->email);
    }
}

<?php

namespace Faridepc78\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    public function build()
    {
        return $this->markdown('User::mails.reset-password-verify-code')->
        subject('وب آموز | بازیابی رمز عبور');
    }
}

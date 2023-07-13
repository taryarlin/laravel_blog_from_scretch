<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $password_reset_link = URL::temporarySignedRoute(
            'reset-password.index',
            Carbon::now()->addMinutes(5),
            ['user_id' => $this->user->id]
        );

        return $this->subject("Forgot Password From Muse")
                ->from('noreply@muse.com')
                ->view('email.forgot_password', [
                    'user' => $this->user,
                    'password_reset_link' => $password_reset_link
                ]);
    }
}

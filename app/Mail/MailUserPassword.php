<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailUserPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $event;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   //configurations to env, to send emails from gmail.
        /*MAIL_DRIVER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=tesisceleues@gmail.com
        MAIL_PASSWORD=tesiscele1
        MAIL_ENCRYPTION=tls
        */

        return $this->from('hello@app.com', 'Your Application')
        ->subject('Event Reminder: ' . "Recordatorio")
        ->view('emails.mailuserpassword',[
            "user"=>$this->event["user"],
            "password"=>$this->event["password"],
            ]);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $reciever;
    protected $email;
    protected $message;
    protected $sender;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender_email, $message, $reciever, $sender)
    {
        $this->reciever = $reciever;
        $this->email = $sender_email;
        $this->message = $message;
        $this->sender = $sender;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)->subject('Reservation Update')->markdown('emails.reservation')->with([
            'message' => $this->message,
            'sender_name' => $this->sender,
            'reciever_name' => $this->reciever,
        ]);
    }
}

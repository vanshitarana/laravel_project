<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;

class SendMailreset extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $email;
    /**
     * Create a new message instance.
     */
    public function __construct($token, $email)
    {
       $this->token = $token;
        $this->email = $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return (new Envelope(
            subject: 'Send Mailreset',
        ))->from(new Address('vanshita.v2web@gmail.com', 'Reset Pssword'));
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'Email.passwordReset',
        );
    }

    public function build()
    {
        return $this->markdown('Email.passwordReset')->with([
            'token' => $this->token,
            'email' => $this->email
        ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

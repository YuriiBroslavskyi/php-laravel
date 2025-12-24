<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    // 1. Accept the User model in the constructor
    public function __construct(
        public User $user
    ) {}

    // 2. Define the subject
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to Our Platform!',
        );
    }

    // 3. Point to the view
    public function content(): Content
    {
        return new Content(
            view: 'emails.welcome',
        );
    }
}
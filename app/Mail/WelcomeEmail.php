<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment; // 1. Import Attachment
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;           // 2. Import PDF Facade

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public User $user
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Welcome to Our Platform!',
        );
    }

    public function content(): Content
    {
        // You can keep a simple body message here, e.g., "Please find the attached PDF."
        return new Content(
            view: 'emails.welcome', 
        );
    }

    // 3. Add this new method to handle the attachment
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => Pdf::loadView('pdfs.welcome_pdf', ['user' => $this->user])->output(), 'Welcome.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
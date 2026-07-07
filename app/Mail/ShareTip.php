<?php

namespace App\Mail;

use App\Models\Tip;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ShareTip extends Mailable
{
    use Queueable, SerializesModels;

    public Tip $tip;

    public function __construct(Tip $tip)
    {
        $this->tip = $tip;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Dica de Tecnologia Compartilhada: ' . $this->tip->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.share-tip',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}

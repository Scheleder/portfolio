<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\URL;

class NewUserRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public string $approvalUrl;

    public function __construct(User $user)
    {
        $this->user = $user;
        // Gera um link assinado seguro para evitar acessos indevidos
        $this->approvalUrl = URL::temporarySignedRoute(
            'user.approve.show',
            now()->addDays(7),
            ['user' => $user->id]
        );
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Solicitação de Acesso - Novo Registro no TechTips',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.new-user-registered',
        );
    }
}

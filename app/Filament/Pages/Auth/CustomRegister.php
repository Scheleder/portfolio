<?php

namespace App\Filament\Pages\Auth;

use App\Mail\NewUserRegistered;
use App\Models\User;
use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Auth\Http\Responses\Contracts\RegistrationResponse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class CustomRegister extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->makeForm()
                ->schema([
                    $this->getNameFormComponent(),
                    $this->getEmailFormComponent(),
                    $this->getPasswordFormComponent(),
                    $this->getPasswordConfirmationFormComponent(),
                    FileUpload::make('avatar')
                        ->image()
                        ->avatar()
                        ->directory('avatars')
                        ->disk('public')
                        ->label('Foto de Perfil (Opcional)'),
                    Textarea::make('bio')
                        ->label('Biografia (Opcional)')
                        ->rows(3),
                ])
                ->statePath('data'),
        ];
    }

    public function register(): ?RegistrationResponse
    {
        try {
            $this->rateLimit(2);
        } catch (\Filament\Exceptions\RateLimitExceededException $exception) {
            Notification::make()
                ->title($exception->getMessage())
                ->danger()
                ->send();

            return null;
        }

        $data = $this->form->getState();

        $user = $this->handleRegistration($data);

        // Envia o e-mail de alerta de novo registro para me@scheleder.com
        Mail::to('me@scheleder.com')->send(new NewUserRegistered($user));

        // Define a mensagem flash de sucesso e aviso de liberação por e-mail
        session()->flash('success', 'Cadastro realizado com sucesso! Sua conta está aguardando liberação. Você receberá um e-mail assim que seu acesso for liberado por um administrador.');

        // Redireciona o visitante para a Home page pública sem fazer login
        $this->redirect('/');

        return null;
    }

    protected function handleRegistration(array $data): Model
    {
        return $this->getUserModel()::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'avatar' => $data['avatar'] ?? null,
            'bio' => $data['bio'] ?? null,
            'is_admin' => false,
            'is_blocked' => true,
        ]);
    }
}

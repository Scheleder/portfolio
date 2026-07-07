<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use App\Mail\UserPasswordReset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Actions;
use Filament\Actions\Action;
use Filament\Schemas\Schema;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
        ->components([
                FileUpload::make('avatar')
                    ->label('Foto de Perfil')
                    ->image()
                    ->avatar()
                    ->directory('avatars')
                    ->disk('public'),

                Textarea::make('bio')
                    ->label('Biografia')
                    ->rows(5),

                TextInput::make('name')
                    ->label('Nome')
                    ->required(),
                    
                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),
                
                TextInput::make('password')
                    ->label('Senha')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required()
                    ->visible(fn (string $operation): bool => $operation === 'create'),

                Toggle::make('is_admin')
                    ->label('Administrador')
                    ->required(),

                Toggle::make('is_blocked')
                    ->label('Bloqueado (Impedir Login)')
                    ->required(),

                // Bloco de Ações Customizadas para Senha (exibido apenas na Edição)
                Actions::make([
                    // Caso 1: Usuário editando o seu próprio perfil -> Abre modal para trocar senha
                    Action::make('changeOwnPassword')
                        ->label('Alterar minha senha')
                        ->icon('heroicon-o-key')
                        ->color('warning')
                        ->form([
                            TextInput::make('new_password')
                                ->label('Nova Senha')
                                ->password()
                                ->required()
                                ->confirmed(),
                            TextInput::make('new_password_confirmation')
                                ->label('Confirmar Nova Senha')
                                ->password()
                                ->required(),
                        ])
                        ->action(function (User $record, array $data) {
                            $record->update([
                                'password' => $data['new_password'],
                            ]);

                            Notification::make()
                                ->title('Senha alterada com sucesso!')
                                ->success()
                                ->send();
                        })
                        ->visible(fn ($record) => $record && $record->id === auth()->id()),

                    // Caso 2: Administrador editando outro usuário -> Botão de Redefinir Senha
                    Action::make('resetUserPassword')
                        ->label('Redefinir senha')
                        ->icon('heroicon-o-arrow-path')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->modalHeading('Redefinir Senha do Usuário')
                        ->modalDescription('Tem certeza que deseja redefinir a senha deste usuário? Uma nova senha temporária será gerada no backend e enviada por e-mail para ele.')
                        ->action(function (User $record) {
                            $newPassword = Str::random(10);
                            
                            $record->update([
                                'password' => $newPassword,
                            ]);

                            // Dispara o e-mail para o usuário com a nova senha
                            Mail::to($record->email)->send(new UserPasswordReset($record, $newPassword));

                            Notification::make()
                                ->title('Senha redefinida com sucesso!')
                                ->body("A nova senha temporária foi enviada para o e-mail: {$record->email}")
                                ->success()
                                ->send();
                        })
                        ->visible(fn ($record) => $record && $record->id !== auth()->id()),
                ])
                ->key('password_actions')
                ->visible(fn (string $operation): bool => $operation === 'edit')
                ->columnSpanFull()
            ]);
    }
}

<?php

namespace App\Filament\Resources\Tips\Tables;

use App\Mail\ShareTip;
use App\Models\Category;
use App\Models\Subcategory;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Mail;

class TipsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label('Título')
                    ->searchable()
                    ->sortable()
                    ->limit(40),
                TextColumn::make('subcategory.category.name')
                    ->label('Categoria')
                    ->sortable(),
                TextColumn::make('subcategory.name')
                    ->label('Subcategoria')
                    ->sortable(),
                TextColumn::make('user.name')
                    ->label('Dono')
                    ->sortable()
                    ->visible(fn () => auth()->user()?->is_admin),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dica' => 'success',
                        'método' => 'warning',
                        'comando' => 'danger',
                        'snippet' => 'info',
                        'tutorial' => 'primary',
                        default => 'gray',
                    })
                    ->sortable(),
                IconColumn::make('is_public')
                    ->label('Público')
                    ->boolean()
                    ->sortable(),
                TextColumn::make('view_count')
                    ->label('Visualizações')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
                SelectFilter::make('category')
                    ->label('Filtrar por Categoria')
                    ->relationship('subcategory.category', 'name'),
                SelectFilter::make('subcategory')
                    ->label('Filtrar por Subcategoria')
                    ->relationship('subcategory', 'name'),
                SelectFilter::make('type')
                    ->label('Filtrar por Tipo')
                    ->options([
                        'dica' => 'Dica',
                        'método' => 'Método',
                        'comando' => 'Comando',
                        'snippet' => 'Snippet',
                        'tutorial' => 'Tutorial',
                    ]),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('')
                    ->icon('heroicon-o-pencil')
                    ->color('info'),
                Action::make('share')
                    ->label('')
                    ->icon('heroicon-o-paper-airplane')
                    ->color('warning')
                    ->form([
                        TextInput::make('email')
                            ->email()
                            ->required()
                            ->label('E-mail do destinatário'),
                    ])
                    ->action(function ($record, array $data) {
                        Mail::to($data['email'])->send(new ShareTip($record));
                        
                        Notification::make()
                            ->title('Dica compartilhada com sucesso!')
                            ->success()
                            ->send();
                    })
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}

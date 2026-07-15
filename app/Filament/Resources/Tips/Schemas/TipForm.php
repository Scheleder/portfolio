<?php

namespace App\Filament\Resources\Tips\Schemas;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;

class TipForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('category_id')
                    ->label('Categoria')
                    ->options(Category::all()->pluck('name', 'id'))
                    ->live()
                    ->dehydrated(false)
                    ->afterStateHydrated(fn (Select $component, $record) => $component->state($record?->subcategory?->category_id))
                    ->required(),

                Select::make('subcategory_id')
                    ->label('Subcategoria')
                    ->options(fn (Get $get) => Subcategory::where('category_id', $get('category_id'))->pluck('name', 'id'))
                    ->required(),

                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $operation, $state, $set) => $operation === 'create' ? $set('slug', str($state)->slug()->toString()) : null),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->unique(ignoreRecord: true),

                RichEditor::make('content')
                    ->label('Conteúdo')
                    ->required()
                    ->columnSpanFull(),

                Select::make('type')
                    ->label('Tipo')
                    ->options([
                        'dica' => 'Dica',
                        'método' => 'Método',
                        'comando' => 'Comando',
                        'snippet' => 'Snippet',
                        'tutorial' => 'Tutorial',
                    ])
                    ->required(),

                TagsInput::make('tags')
                    ->label('Tags')
                    ->placeholder('Adicionar tag...'),

                Toggle::make('is_public')
                    ->label('Público (Pode ser compartilhado por e-mail)')
                    ->default(true)
                    ->required(),

                TextInput::make('view_count')
                    ->label('Visualizações')
                    ->required()
                    ->numeric()
                    ->default(0)
                    ->disabled(),

                // Administradores podem reatribuir o dono do card
                Select::make('user_id')
                    ->label('Dono do Card')
                    ->options(User::whereNot('is_blocked', true)->pluck('name', 'id'))
                    ->default(fn () => auth()->id())
                    ->searchable()
                    ->visible(fn () => auth()->user()?->is_admin)
                    ->required(),

                // Não-admins têm o user_id preenchido automaticamente (oculto)
                Hidden::make('user_id')
                    ->default(fn () => auth()->id())
                    ->visible(fn () => ! auth()->user()?->is_admin),
            ]);
    }
}

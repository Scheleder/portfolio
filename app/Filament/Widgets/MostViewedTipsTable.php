<?php

namespace App\Filament\Widgets;

use App\Models\Tip;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class MostViewedTipsTable extends BaseWidget
{
    protected static ?int $sort = 5;

    public function table(Table $table): Table
    {
        $query = Tip::query();

        return $table
            ->query($query->orderBy('view_count', 'desc')->limit(5))
            ->heading('Cards Mais Visualizados (Top 5)')
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Título')
                    ->limit(40),
                Tables\Columns\TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'dica' => 'success',
                        'método' => 'warning',
                        'comando' => 'danger',
                        'snippet' => 'info',
                        'tutorial' => 'gray',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('subcategory.name')
                    ->label('Subcategoria'),
                Tables\Columns\TextColumn::make('view_count')
                    ->label('Visualizações')
                    ->badge()
                    ->color('primary'),
            ]);
    }
}

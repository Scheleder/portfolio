<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\ChartWidget;

class TipsByUserChart extends ChartWidget
{
    protected ?string $heading = 'Cards por Usuário';

    protected static ?int $sort = 4;

    protected function getData(): array
    {
        // Busca todos os usuários com contagem de cards
        $users = User::withCount('tips')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Quantidade de Cards',
                    'data' => $users->pluck('tips_count')->toArray(),
                    'backgroundColor' => '#5c0011', // Bordô Escuro do tema
                ],
            ],
            'labels' => $users->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

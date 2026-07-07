<?php

namespace App\Filament\Widgets;

use App\Models\Tip;
use Filament\Widgets\ChartWidget;

class TipsByTypeChart extends ChartWidget
{
    protected ?string $heading = 'Distribuição por Tipo de Card';

    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $types = ['dica', 'método', 'comando', 'snippet', 'tutorial'];
        $data = [];

        foreach ($types as $type) {
            $data[] = Tip::where('type', $type)->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Tipos de Card',
                    'data' => $data,
                    'backgroundColor' => [
                        '#10b981', // Emerald (dica)
                        '#f59e0b', // Amber (método)
                        '#f43f5e', // Rose (comando)
                        '#06b6d4', // Cyan (snippet)
                        '#8b5cf6', // Violet (tutorial)
                    ],
                ],
            ],
            'labels' => array_map('ucfirst', $types),
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}

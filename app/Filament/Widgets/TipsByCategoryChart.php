<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Tip;
use Filament\Widgets\ChartWidget;

class TipsByCategoryChart extends ChartWidget
{
    protected ?string $heading = 'Cards por Categoria';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        // Busca as categorias com contagem de cards
        $categories = Category::all()->map(function ($category) {
            $tipsQuery = Tip::whereHas('subcategory', function ($query) use ($category) {
                $query->where('category_id', $category->id);
            });

            return [
                'name' => $category->name,
                'count' => $tipsQuery->count(),
            ];
        });

        return [
            'datasets' => [
                [
                    'label' => 'Quantidade de Cards',
                    'data' => $categories->pluck('count')->toArray(),
                    'backgroundColor' => [
                        '#5c0011', // Bordô Escuro do tema
                        '#f59e0b', // Amarelo/Amber
                        '#10b981', // Verde/Emerald
                        '#0ea5e9', // Azul/Sky
                        '#8b5cf6', // Roxo/Violet
                    ],
                ],
            ],
            'labels' => $categories->pluck('name')->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}

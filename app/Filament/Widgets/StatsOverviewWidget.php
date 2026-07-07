<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Tip;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $user = auth()->user();
        $isAdmin = (bool) ($user?->is_admin);

        // Contagem de cards/tips
        $totalTips = Tip::count();

        // Total de visualizações
        $totalViews = Tip::sum('view_count');

        // Total de categorias
        $totalCategories = Category::count();

        $stats = [
            Stat::make('Total de Cards', $totalTips)
                ->description('Todos os cards do repositório')
                ->descriptionIcon('heroicon-m-light-bulb')
                ->color('success'),
            Stat::make('Visualizações Totais', $totalViews)
                ->description('Acessos acumulados')
                ->descriptionIcon('heroicon-m-eye')
                ->color('info'),
            Stat::make('Categorias Ativas', $totalCategories)
                ->description('Categorias de tecnologia')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning'),
        ];

        // Apenas Administradores veem a contagem de usuários
        if ($isAdmin) {
            $totalUsers = User::count();
            $stats[] = Stat::make('Usuários Cadastrados', $totalUsers)
                ->description('Contas ativas e bloqueadas')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary');
        }

        return $stats;
    }
}

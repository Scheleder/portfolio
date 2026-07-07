<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Facades\FilamentView;
use Filament\View\PanelsRenderHook;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\HtmlString;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(\App\Filament\Pages\Auth\CustomLogin::class)
            ->registration(\App\Filament\Pages\Auth\CustomRegister::class)
            ->profile(\App\Filament\Pages\Auth\CustomEditProfile::class)
            ->colors([
                'primary' => Color::hex('#5c0011'),
            ])
            ->brandLogo(fn () => asset('images/logo_black.png'))
            ->darkModeBrandLogo(fn () => asset('images/logo_black.png'))
            ->brandLogoHeight('4rem')
            ->brandName('TechTips Repository')
            ->homeUrl('/techtips')
            ->favicon(fn () => asset('images/bulb.png'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                //
            ])
            ->topNavigation(fn () => session('filament_navigation_layout') === 'top')
            ->userMenuItems([
                \Filament\Navigation\MenuItem::make()
                    ->label(fn () => session('filament_navigation_layout') === 'top' ? 'Menu Lateral' : 'Menu Superior')
                    ->icon('heroicon-o-arrows-right-left')
                    ->url(fn () => route('filament.toggle-layout')),
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }

    public function boot(): void
    {
        // Injeta a logo com link para a Home nas páginas de autenticação (login/register)
        FilamentView::registerRenderHook(
            PanelsRenderHook::SIMPLE_LAYOUT_START,
            fn (): HtmlString => new HtmlString('
                <div class="flex justify-center pt-8 pb-2">
                    <a href="/" title="Ir para a página inicial">
                        <img
                            src="' . asset('images/logo_black.png') . '"
                            alt="TechTips Repository"
                            style="height: 4rem; width: auto; object-fit: contain;"
                        />
                    </a>
                </div>
            '),
        );
    }
}

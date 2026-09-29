<?php

declare(strict_types=1);

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use FilamentCraft\FilamentCraftPlugin;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\PreventRequestForgery;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    private const NORTHBAY_BLUE = [
        50 => 'oklch(0.97 0.014 266)',
        100 => 'oklch(0.93 0.032 266)',
        200 => 'oklch(0.87 0.062 266)',
        300 => 'oklch(0.78 0.1 266)',
        400 => 'oklch(0.66 0.16 266)',
        500 => 'oklch(0.55 0.2 266)',
        600 => 'oklch(0.47 0.2 266)',
        700 => 'oklch(0.41 0.18 266)',
        800 => 'oklch(0.36 0.14 266)',
        900 => 'oklch(0.31 0.1 266)',
        950 => 'oklch(0.22 0.07 266)',
    ];

    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('Northbay Joinery')
            ->colors([
                'primary' => self::NORTHBAY_BLUE,
                'gray' => Color::Zinc,
            ])
            ->plugin(
                FilamentCraftPlugin::make()
                    ->singleSite()
                    ->navigationGroup('Website')
            )
            ->navigationItems([
                NavigationItem::make('View website')
                    ->url('/', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->group('Website')
                    ->sort(99),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\Filament\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\Filament\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\Filament\Widgets')
            ->widgets([
                AccountWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                PreventRequestForgery::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}

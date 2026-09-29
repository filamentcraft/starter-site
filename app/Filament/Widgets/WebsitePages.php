<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use FilamentCraft\Editor\Pages\EditorPage;
use FilamentCraft\Models\Site;
use FilamentCraft\Models\Template;

class WebsitePages extends TableWidget
{
    protected static ?int $sort = 2;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Website pages')
            ->description('Open a page in the visual editor, or see it the way visitors do.')
            ->query(fn () => Template::query()
                ->forSite(Site::query()->live()->value('id') ?? 0)
                ->orderBy('id'))
            ->columns([
                TextColumn::make('name')
                    ->weight('medium')
                    ->description(fn (Template $record): string => $record->isHomepage() ? '/' : '/'.$record->slug),
                TextColumn::make('status')->badge(),
                TextColumn::make('updated_at')->label('Last change')->since(),
            ])
            ->recordActions([
                Action::make('edit')
                    ->label('Edit')
                    ->icon('heroicon-o-paint-brush')
                    ->url(fn (Template $record): string => EditorPage::getUrl(['template' => $record]), shouldOpenInNewTab: true),
                Action::make('view')
                    ->label('View')
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->color('gray')
                    ->url(fn (Template $record): ?string => $record->publicUrl(), shouldOpenInNewTab: true),
            ])
            ->paginated(false);
    }
}

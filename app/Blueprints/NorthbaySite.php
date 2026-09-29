<?php

declare(strict_types=1);

namespace App\Blueprints;

use App\Blueprints\Concerns\BuildsSections;
use App\Blueprints\Pages\AboutPage;
use App\Blueprints\Pages\ContactPage;
use App\Blueprints\Pages\HomePage;
use App\Blueprints\Pages\ServicesPage;
use App\Blueprints\Pages\WorkPage;
use App\Support\SiteImages;
use FilamentCraft\Blueprints\BlueprintRegion;
use FilamentCraft\Blueprints\SiteBlueprint;
use FilamentCraft\Enums\RegionName;
use FilamentCraft\Sections\Builtin\FooterSection;
use FilamentCraft\Sections\Builtin\HeaderSection;

final class NorthbaySite extends SiteBlueprint
{
    use BuildsSections;

    public const SCHEME = 'northbay';

    public const CHALK = 'northbay-chalk';

    public const INK = 'northbay-ink';

    public function name(): string
    {
        return 'Northbay Joinery';
    }

    public function pages(): array
    {
        return [
            HomePage::class,
            WorkPage::class,
            ServicesPage::class,
            AboutPage::class,
            ContactPage::class,
        ];
    }

    public function regions(): array
    {
        return [
            BlueprintRegion::make(RegionName::Header)->sections([
                $this->section(HeaderSection::class, [
                    'brand_text' => 'Northbay Joinery',
                    'cta_enabled' => true,
                    'cta_label' => 'Book a survey',
                    'cta_url' => '/contact',
                    'show_locale_switcher' => false,
                    'sticky' => true,
                    'show_border' => true,
                ], $this->blocks('nav-link', [
                    ['label' => 'Work', 'url' => '/work'],
                    ['label' => 'Services', 'url' => '/services'],
                    ['label' => 'About', 'url' => '/about'],
                    ['label' => 'Contact', 'url' => '/contact'],
                ])),
            ]),
            BlueprintRegion::make(RegionName::Footer)->sections([
                $this->section(FooterSection::class, [
                    'brand' => 'Northbay Joinery',
                    'description' => 'Kitchens, staircases, libraries and furniture, drawn and built in Leith and fitted by the people who made them.',
                    'copyright' => '© '.now()->year.' Northbay Joinery Ltd. Unit 4, Bangor Road, Leith, Edinburgh EH6 5JX.',
                ], $this->blocks('link', [
                    ['column' => 'Workshop', 'label' => 'Recent work', 'url' => '/work'],
                    ['column' => 'Workshop', 'label' => 'Services and budgets', 'url' => '/services'],
                    ['column' => 'Workshop', 'label' => 'How we work', 'url' => '/about'],
                    ['column' => 'Visit', 'label' => 'Book a survey', 'url' => '/contact'],
                    ['column' => 'Visit', 'label' => 'Workshop open day', 'url' => '/contact'],
                ]), scheme: self::INK),
            ]),
        ];
    }

    public function siteSettings(): array
    {
        return [
            'color_scheme' => self::SCHEME,
            'heading_font' => 'schibsted-grotesk',
            'default_font' => 'schibsted-grotesk',
            'seo' => [
                'description' => 'Kitchens, staircases, libraries and tables made to measure in Leith, Edinburgh.',
                'og_image' => SiteImages::path('workshop-bench'),
            ],
            'schemes' => [
                self::SCHEME => $this->scheme([
                    'background' => '#f7f7f6',
                    'on-background' => '#16181d',
                    'surface' => '#ffffff',
                    'on-surface' => '#16181d',
                    'surface-alt' => '#ecedef',
                    'on-surface-alt' => '#353942',
                    'primary' => '#2446c8',
                    'on-primary' => '#ffffff',
                    'secondary' => '#16181d',
                    'on-secondary' => '#ffffff',
                    'accent' => '#9c5420',
                    'on-accent' => '#ffffff',
                    'neutral' => '#5b606a',
                ]),
                self::CHALK => $this->scheme([
                    'background' => '#2446c8',
                    'on-background' => '#ffffff',
                    'surface' => '#1f3db3',
                    'on-surface' => '#ffffff',
                    'surface-alt' => '#1a3499',
                    'on-surface-alt' => '#e1e7ff',
                    'primary' => '#ffffff',
                    'on-primary' => '#2446c8',
                    'secondary' => '#16181d',
                    'on-secondary' => '#ffffff',
                    'accent' => '#ffd4ae',
                    'on-accent' => '#16181d',
                    'neutral' => '#c7d1ff',
                ]),
                self::INK => $this->scheme([
                    'background' => '#16181d',
                    'on-background' => '#f2f3f5',
                    'surface' => '#1e2128',
                    'on-surface' => '#f2f3f5',
                    'surface-alt' => '#272b33',
                    'on-surface-alt' => '#d4d7dd',
                    'primary' => '#8fa3ff',
                    'on-primary' => '#16181d',
                    'secondary' => '#f2f3f5',
                    'on-secondary' => '#16181d',
                    'accent' => '#e3a574',
                    'on-accent' => '#16181d',
                    'neutral' => '#a4a9b3',
                ]),
            ],
        ];
    }

    /**
     * @param  array<string, string>  $colors
     * @return array<string, string>
     */
    private function scheme(array $colors): array
    {
        return [
            ...$colors,
            'on-neutral' => '#ffffff',
            'info' => '#2446c8',
            'on-info' => '#ffffff',
            'success' => '#1c7a45',
            'on-success' => '#ffffff',
            'warning' => '#a35a00',
            'on-warning' => '#ffffff',
            'danger' => '#b42318',
            'on-danger' => '#ffffff',
        ];
    }
}

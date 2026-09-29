<?php

declare(strict_types=1);

namespace App\Blueprints\Concerns;

use App\Blueprints\NorthbaySite;
use App\Support\SiteImages;
use FilamentCraft\Blueprints\BlueprintSection;
use FilamentCraft\Sections\Contracts\Section;

trait BuildsSections
{
    /**
     * @param  class-string<Section>  $section
     * @param  array<string, mixed>  $settings
     * @param  list<array<string, mixed>>  $blocks
     */
    protected function section(string $section, array $settings = [], array $blocks = [], string $scheme = NorthbaySite::SCHEME): BlueprintSection
    {
        if (array_key_exists('scheme', $section::defaults()['settings'])) {
            $settings['scheme'] = $scheme;
        }

        $blueprint = BlueprintSection::make($section)->settings($settings);

        return $blocks === [] ? $blueprint : $blueprint->blocks($blocks);
    }

    /**
     * @param  list<array<string, mixed>>  $items
     * @return list<array{id: string, type: string, settings: array<string, mixed>}>
     */
    protected function blocks(string $type, array $items): array
    {
        return array_map(
            fn (int $index, array $settings): array => ['id' => "{$type}-".($index + 1), 'type' => $type, 'settings' => $settings],
            array_keys($items),
            $items,
        );
    }

    protected function image(string $name): string
    {
        return SiteImages::path($name);
    }
}

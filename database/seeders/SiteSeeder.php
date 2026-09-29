<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Blueprints\NorthbaySite;
use App\Blueprints\Pages\Page;
use App\Support\SiteImages;
use FilamentCraft\Models\Site;
use FilamentCraft\Models\Template;
use FilamentCraft\Seo\TemplateSeo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class SiteSeeder extends Seeder
{
    public function run(): void
    {
        if (Site::query()->exists()) {
            return;
        }

        Artisan::call('filamentcraft:sync-themes');
        SiteImages::publish();

        $blueprint = app(NorthbaySite::class);
        $site = $blueprint::provision();

        SiteImages::register($site);

        foreach ($blueprint->pages() as $page) {
            $this->describe($site, app($page));
        }
    }

    private function describe(Site $site, Page $page): void
    {
        $template = Template::query()
            ->forSite($site->getKey())
            ->where('blueprint_slug', $page->slug())
            ->first();

        if ($template instanceof Template) {
            TemplateSeo::write($template, $site->default_locale, ['description' => $page->description()]);
        }
    }
}

<?php

declare(strict_types=1);

use FilamentCraft\Models\Media;
use FilamentCraft\Models\Site;
use FilamentCraft\Models\Template;
use Illuminate\Support\Facades\Storage;

beforeEach(function (): void {
    Storage::fake('public');

    $this->seed();
});

it('serves every page of the seeded site', function (string $path, string $heading): void {
    $this->get($path)
        ->assertOk()
        ->assertSee($heading, escape: false);
})->with([
    'home' => ['/', 'Made for one room. Built in Leith.'],
    'work' => ['/work', 'Walnut spiral, Stockbridge'],
    'services' => ['/services', 'Typical budgets.'],
    'about' => ['/about', 'Six joiners, one workshop.'],
    'contact' => ['/contact', 'Book a survey'],
]);

it('provisions one live site with every page published', function (): void {
    $site = Site::query()->sole();

    expect($site->name)->toBe('Northbay Joinery')
        ->and(Template::query()->forSite($site->getKey())->published()->count())->toBe(5)
        ->and($site->homepage_template_id)->not->toBeNull();
});

it('does not duplicate the site when seeded again', function (): void {
    $this->seed();

    expect(Site::query()->count())->toBe(1)
        ->and(Template::query()->count())->toBe(5);
});

it('copies the photography into the media library', function (): void {
    Storage::disk('public')->assertExists('filamentcraft/uploads/northbay/workshop-bench.jpg');

    expect(Media::query()->where('alt', '!=', '')->count())->toBe(21);
});

it('gives every page a meta description', function (): void {
    $this->get('/services')
        ->assertSee('<meta name="description" content="What Northbay Joinery makes', escape: false);
});

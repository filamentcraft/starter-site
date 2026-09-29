<?php

declare(strict_types=1);

use App\Filament\Widgets\WebsitePages;
use App\Models\User;
use FilamentCraft\Models\Site;
use FilamentCraft\Models\Template;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function (): void {
    Storage::fake('public');

    $this->seed();
});

it('shows the login page to guests', function (): void {
    $this->get('/admin')->assertRedirect('/admin/login');
    $this->get('/admin/login')->assertOk();
});

it('lets the seeded admin into the panel', function (): void {
    $this->actingAs(User::query()->where('email', 'admin@example.com')->sole())
        ->get('/admin')
        ->assertOk()
        ->assertSee('Website builder');
});

it('opens the visual editor on the homepage', function (): void {
    $homepage = Site::query()->sole()->homepage_template_id;

    $this->actingAs(User::query()->where('email', 'admin@example.com')->sole())
        ->get("/admin/filamentcraft/editor/{$homepage}")
        ->assertOk();
});

it('lists every website page on the dashboard', function (): void {
    $this->actingAs(User::query()->where('email', 'admin@example.com')->sole());

    Livewire::test(WebsitePages::class)
        ->assertCanSeeTableRecords(Template::query()->get())
        ->assertSee('/services');
});

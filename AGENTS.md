# Working in this project

A Laravel 13 + Filament 5 app whose public website is built with FilamentCraft.

- Site content is seeded from code: `app/Blueprints/NorthbaySite.php` (theme, header, footer,
  color schemes, fonts, SEO defaults) and one class per page in `app/Blueprints/Pages`.
  Each page builds sections with `$this->section(SectionClass::class, [...settings], $this->blocks(...))`.
- Seeded photos live in `resources/images` and are copied into the media library by
  `App\Support\SiteImages`. Add a photo there and to `SiteImages::ALT` to make it available.
- After the first seed, the website is edited in the admin panel (`/admin`, Website builder),
  not in these classes. `php artisan migrate:fresh --seed` rebuilds the site from code.
- FilamentCraft serves every public page through its fallback route (`public_routes` in
  `config/filamentcraft.php`). Routes you add to `routes/web.php` take precedence.
- Before finishing a change, run `composer test` (Pint, PHPStan level 6, Pest).

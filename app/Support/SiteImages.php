<?php

declare(strict_types=1);

namespace App\Support;

use FilamentCraft\Media\MediaLibrary;
use FilamentCraft\Models\Site;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

final class SiteImages
{
    /** @var array<string, string> */
    public const ALT = [
        'workshop-bench' => 'A joiner planing an oak board at the bench, shavings piling up',
        'workshop-floor' => 'The Leith workshop floor in morning light, benches and timber racks',
        'plane-shavings' => 'A bench plane resting in a drift of fresh oak shavings',
        'planing-by-hand' => 'Planing a board flat by hand before it goes near a machine',
        'marking-out' => 'Marking out a joint with a pencil and square',
        'timber-stack' => 'Air-drying oak boards stickered and stacked in the timber store',
        'mortise' => 'A mortise cut into a beam on the mortiser',
        'tool-chest' => 'An open tool chest of saws, chisels and marking gauges',
        'tool-wall' => 'Planes and chisels hung on the workshop wall',
        'old-planes' => 'Three wooden-bodied planes that belonged to the founder’s grandfather',
        'kitchen-oak' => 'A rift-sawn oak kitchen with a stone-topped island and three stools',
        'kitchen-curve' => 'A curved oak kitchen run with a fluted stone splashback',
        'library-wall' => 'A floor-to-ceiling oak library wall with drawers along the base',
        'library-ladder' => 'Library shelving with a sliding oak ladder',
        'stair-curve' => 'A curved staircase lined in steamed oak',
        'stair-spiral' => 'A spiral stair in walnut, seen from above',
        'table-long' => 'A four-metre oak refectory table under a pendant light',
        'table-walnut' => 'A walnut dining table in low evening light',
        'table-pedestal' => 'A round walnut table on a fanned pedestal base',
        'wardrobe' => 'A wall of fitted oak wardrobes with mirrored doors',
        'dressing-room' => 'A walk-in dressing room fitted in pale ash',
    ];

    private const FOLDER = 'northbay';

    public static function path(string $name): string
    {
        return self::directory().'/'.$name.'.jpg';
    }

    public static function publish(): void
    {
        $disk = Storage::disk(MediaLibrary::uploadsDisk());

        foreach (array_keys(self::ALT) as $name) {
            if (! $disk->exists(self::path($name))) {
                $disk->put(self::path($name), File::get(resource_path("images/{$name}.jpg")));
            }
        }
    }

    public static function register(Site $site): void
    {
        $library = app(MediaLibrary::class);

        foreach (self::ALT as $name => $alt) {
            $library->register($site, self::path($name), name: "{$name}.jpg", mime: 'image/jpeg')
                ?->update(['title' => Str::headline($name), 'alt' => $alt]);
        }
    }

    private static function directory(): string
    {
        return trim((string) config('filamentcraft.uploads.directory'), '/').'/'.self::FOLDER;
    }
}

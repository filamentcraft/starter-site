<?php

declare(strict_types=1);

namespace App\Blueprints\Pages;

use App\Blueprints\Concerns\BuildsSections;
use FilamentCraft\Blueprints\AbstractBlueprint;

abstract class Page extends AbstractBlueprint
{
    use BuildsSections;

    abstract public function description(): string;
}

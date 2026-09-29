<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Filament\Facades\Filament;
use FilamentCraft\Models\Site;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('starter:ready')]
#[Description('Print where the site and the admin panel live after setup')]
class StarterReadyCommand extends Command
{
    public function handle(): int
    {
        $site = Site::query()->live()->firstOrFail();
        $url = rtrim((string) config('app.url'), '/');

        $this->newLine();
        $this->components->info($site->name.' is ready.');
        $this->components->twoColumnDetail('Website', $url);
        $this->components->twoColumnDetail('Admin panel', $url.'/'.Filament::getDefaultPanel()->getPath());
        $this->components->twoColumnDetail('Sign in', 'admin@example.com / password');
        $this->components->twoColumnDetail('Start the server', 'composer dev');
        $this->newLine();

        return self::SUCCESS;
    }
}

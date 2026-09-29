<?php

declare(strict_types=1);

namespace App\Blueprints\Pages;

use App\Blueprints\NorthbaySite;
use FilamentCraft\Sections\Builtin\ImageTextSection;
use FilamentCraft\Sections\Builtin\StatsSection;
use FilamentCraft\Sections\Builtin\TeamSection;

final class AboutPage extends Page
{
    public function name(): string
    {
        return 'About';
    }

    public function slug(): string
    {
        return 'about';
    }

    public function description(): string
    {
        return 'Six joiners in a former bus depot in Leith. How Northbay Joinery started, how we build and who you will meet.';
    }

    public function sections(): array
    {
        return [
            $this->section(ImageTextSection::class, [
                'eyebrow' => 'About the workshop',
                'title' => 'Started with a grandfather’s planes and a rented garage.',
                'body' => 'Rory Maclean left a furniture factory in 2011 with three wooden planes that had been his grandfather’s and a van he could not really afford. The first jobs were bookshelves for friends in a rented garage in Newhaven. Fifteen years on there are six of us in a former bus depot on Bangor Road, and the planes are still on the wall.',
                'url' => '/work',
                'label' => 'See what we make now',
                'image' => $this->image('old-planes'),
                'media_placement' => 'end',
                'align' => 'start',
            ]),

            $this->section(ImageTextSection::class, [
                'eyebrow' => 'How we build',
                'title' => 'Machines for the rough work, hands for the last millimetre.',
                'body' => 'Boards are dimensioned on machines, because nobody needs to plane forty metres of oak by hand. Joints are cut to fit, surfaces are finished with a plane rather than sandpaper, and every piece is dry-assembled in the workshop before it goes near your house.',
                'url' => '/services',
                'label' => 'Services and budgets',
                'image' => $this->image('planing-by-hand'),
                'media_placement' => 'start',
                'align' => 'start',
            ]),

            $this->section(StatsSection::class, [
                'eyebrow' => '',
                'title' => 'Fifteen years, in round numbers.',
                'intro' => '',
                'layout' => 'band',
                'shape' => 'clean',
                'align' => 'start',
            ], $this->blocks('stat', [
                ['value' => '410', 'label' => 'Rooms fitted', 'description' => 'Most of them within an hour of the workshop.'],
                ['value' => '2', 'label' => 'Call-backs under guarantee', 'description' => 'Both were door hinges.'],
                ['value' => '85%', 'label' => 'Scottish timber', 'description' => 'By volume, across last year’s jobs.'],
            ]), scheme: NorthbaySite::INK),

            $this->section(TeamSection::class, [
                'eyebrow' => '',
                'title' => 'Six joiners, one workshop.',
                'intro' => 'Whoever surveys your room builds and fits it. Nothing is handed on.',
                'layout' => 'grid',
                'style' => 'minimal',
                'columns' => '3',
                'align' => 'start',
                'show_socials' => false,
            ], $this->blocks('member', [
                ['name' => 'Rory Maclean', 'role' => 'Founder, staircases', 'bio' => 'Still draws every stair himself.'],
                ['name' => 'Hamish Ogilvie', 'role' => 'Kitchens', 'bio' => 'Ten years with Northbay, before that boatbuilding in Ullapool.'],
                ['name' => 'Tomasz Wiśniewski', 'role' => 'Workshop lead', 'bio' => 'Runs the machine shop and the timber yard.'],
                ['name' => 'Ewan Dunbar', 'role' => 'Libraries and built-ins', 'bio' => 'Has scribed shelving to walls no one else would attempt.'],
                ['name' => 'Kwame Asante', 'role' => 'Furniture', 'bio' => 'Makes the tables, and most of the chairs that go with them.'],
                ['name' => 'Finn Gallagher', 'role' => 'Apprentice, year three', 'bio' => 'Cut the dovetails on the drawers in our own kitchen.'],
            ])),
        ];
    }
}

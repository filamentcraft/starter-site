<?php

declare(strict_types=1);

namespace App\Blueprints\Pages;

use App\Blueprints\NorthbaySite;
use FilamentCraft\Sections\Builtin\CtaSection;
use FilamentCraft\Sections\Builtin\PortfolioSection;
use FilamentCraft\Sections\Builtin\RichTextSection;

final class WorkPage extends Page
{
    public function name(): string
    {
        return 'Work';
    }

    public function slug(): string
    {
        return 'work';
    }

    public function description(): string
    {
        return 'Recent kitchens, staircases, libraries and tables from the Northbay Joinery workshop in Leith, Edinburgh.';
    }

    public function sections(): array
    {
        return [
            $this->section(RichTextSection::class, [
                'eyebrow' => '',
                'title' => 'Recent work',
                'body' => '<p>A selection of jobs from the last two years. Most of our work comes from people who have seen a neighbour’s kitchen or a friend’s stair, so we photograph everything before we leave. Ask and we can usually arrange a visit to a finished job near you.</p>',
                'layout' => 'article',
                'width' => 'md',
                'align' => 'start',
                'surface' => false,
            ]),

            $this->section(PortfolioSection::class, [
                'eyebrow' => '',
                'title' => '',
                'intro' => '',
                'layout' => 'grid',
                'columns' => '2',
                'show_categories' => true,
                'show_results' => true,
                'align' => 'start',
                'shape' => 'clean',
            ], $this->blocks('project', [
                [
                    'image' => $this->image('kitchen-oak'),
                    'category' => 'Kitchen',
                    'title' => 'Rift-sawn oak kitchen, Trinity',
                    'summary' => 'A family kitchen with a three-metre island, drawers instead of low cupboards, and a larder wall that hides the fridge.',
                    'result' => 'Fitted in four days',
                ],
                [
                    'image' => $this->image('stair-spiral'),
                    'category' => 'Staircase',
                    'title' => 'Walnut spiral, Stockbridge',
                    'summary' => 'A spiral stair to a new attic room, built as a single stack of treads around a laminated walnut column.',
                    'result' => '1.4 m diameter',
                ],
                [
                    'image' => $this->image('library-ladder'),
                    'category' => 'Library',
                    'title' => 'Double-height library, Morningside',
                    'summary' => 'Shelving across two floors of a converted chapel, with a sliding ladder on a brass rail and cupboards for vinyl along the base.',
                    'result' => '4,000 books',
                ],
                [
                    'image' => $this->image('table-long'),
                    'category' => 'Table',
                    'title' => 'Refectory table, Portobello',
                    'summary' => 'Four metres of oak from a single tree felled in Perthshire, on trestles that come apart for moving house.',
                    'result' => 'Seats fourteen',
                ],
                [
                    'image' => $this->image('dressing-room'),
                    'category' => 'Built-ins',
                    'title' => 'Ash dressing room, Grange',
                    'summary' => 'A box room turned dressing room: hanging, drawers and shoe shelves on every wall, lit from inside the cabinets.',
                    'result' => '9 m of hanging',
                ],
                [
                    'image' => $this->image('kitchen-curve'),
                    'category' => 'Kitchen',
                    'title' => 'Curved kitchen run, Portobello',
                    'summary' => 'Cabinets built on a curve to follow a bay window, with steam-bent oak doors and a fluted stone splashback.',
                    'result' => '3.2 m radius',
                ],
            ])),

            $this->section(CtaSection::class, [
                'badge' => '',
                'heading' => 'Want to see one in person?',
                'subheading' => 'Several clients are happy for us to bring prospective customers round. Tell us what you are planning and we will find the nearest one.',
                'note' => '',
                'label' => 'Arrange a visit',
                'url' => '/contact',
                'layout' => 'center',
                'align' => 'center',
                'shape' => 'contained',
            ], scheme: NorthbaySite::CHALK),
        ];
    }
}

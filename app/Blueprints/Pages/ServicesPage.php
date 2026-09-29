<?php

declare(strict_types=1);

namespace App\Blueprints\Pages;

use App\Blueprints\NorthbaySite;
use FilamentCraft\Sections\Builtin\FaqSection;
use FilamentCraft\Sections\Builtin\PricingSection;
use FilamentCraft\Sections\Builtin\TabsSection;

final class ServicesPage extends Page
{
    public function name(): string
    {
        return 'Services';
    }

    public function slug(): string
    {
        return 'services';
    }

    public function description(): string
    {
        return 'What Northbay Joinery makes, how each job is built, typical budgets and answers on lead times, timber and deposits.';
    }

    public function sections(): array
    {
        return [
            $this->section(TabsSection::class, [
                'eyebrow' => '',
                'title' => 'What we make.',
                'intro' => 'Pick a job to see how we build it and what goes into the price.',
                'tab_style' => 'underline',
                'placement' => 'top',
                'align' => 'start',
            ], $this->blocks('tab', [
                [
                    'label' => 'Kitchens',
                    'icon' => '',
                    'heading' => 'Solid-timber kitchens',
                    'body' => 'Carcasses in oak, ash or painted tulipwood, jointed rather than screwed. Drawers are dovetailed and run on Blum full-extension slides. Most kitchens take eight weeks on the bench and four days to fit. We work with your plumber and electrician, or bring the ones we trust.',
                    'image' => $this->image('kitchen-oak'),
                ],
                [
                    'label' => 'Staircases',
                    'icon' => '',
                    'heading' => 'Housed and wedged stairs',
                    'body' => 'Straight flights, winders and spirals. Treads are housed into the strings and wedged from below, so there is nothing to work loose. We produce the building-control drawings and can remove the old stair on the same visit.',
                    'image' => $this->image('stair-curve'),
                ],
                [
                    'label' => 'Libraries',
                    'icon' => '',
                    'heading' => 'Libraries, alcoves and wardrobes',
                    'body' => 'Built-ins scribed on site to the wall, the floor and the cornice. Shelves are 25 mm solid timber on hidden steel pins, so a full row of art books will not sag. Sliding ladders, window seats and hidden doors on request.',
                    'image' => $this->image('library-wall'),
                ],
                [
                    'label' => 'Tables',
                    'icon' => '',
                    'heading' => 'Tables from a single tree',
                    'body' => 'We buy whole logs from sawmills in Perthshire and Fife, air-dry them in the yard and keep boards from each tree together. You choose the log, we build the top from it. Lead time is around ten weeks.',
                    'image' => $this->image('table-walnut'),
                ],
            ])),

            $this->section(PricingSection::class, [
                'eyebrow' => '',
                'title' => 'Typical budgets.',
                'intro' => 'Every job is priced from drawings, but these are the ranges most of our work falls into, including fitting and VAT.',
                'billing_note' => 'The price on your drawings is fixed unless you change the design.',
                'align' => 'start',
            ], $this->blocks('plan', [
                [
                    'name' => 'Built-ins',
                    'price' => '£3.5k',
                    'period' => 'and up',
                    'description' => 'An alcove pair, a window seat or a single wardrobe wall.',
                    'features' => "Scribed to the room\nPainted or oiled finish\nTwo to three weeks on the bench",
                    'url' => '/contact',
                    'label' => 'Ask about built-ins',
                ],
                [
                    'name' => 'Kitchens',
                    'price' => '£24k',
                    'period' => 'and up',
                    'description' => 'A full kitchen in solid timber, before appliances and stone.',
                    'features' => "Survey and drawings included\nDovetailed drawers throughout\nFitted by the joiners who built it",
                    'highlighted' => true,
                    'url' => '/contact',
                    'label' => 'Book a kitchen survey',
                ],
                [
                    'name' => 'Staircases',
                    'price' => '£11k',
                    'period' => 'and up',
                    'description' => 'A straight oak flight with balustrade, removed and replaced.',
                    'features' => "Building-control drawings\nOld stair taken away\nOne week of disruption, usually less",
                    'url' => '/contact',
                    'label' => 'Ask about stairs',
                ],
            ]), scheme: NorthbaySite::SCHEME),

            $this->section(FaqSection::class, [
                'eyebrow' => '',
                'title' => 'Before you ask.',
                'intro' => '',
                'align' => 'start',
            ], $this->blocks('item', [
                ['question' => 'How far do you travel?', 'answer' => 'Surveys are free within 40 miles of Leith. Beyond that we charge travel at cost, and we have fitted as far as Inverness and Newcastle.'],
                ['question' => 'How long is the wait?', 'answer' => 'Drawings usually follow within two weeks of a survey. Workshop time is twelve to sixteen weeks for kitchens and stairs, fewer for built-ins.'],
                ['question' => 'Where does the timber come from?', 'answer' => 'Oak, ash and elm from Scottish sawmills where we can, FSC-certified European oak when a job needs longer lengths, and American black walnut for furniture.'],
                ['question' => 'Do you take deposits?', 'answer' => 'A third when you approve the drawings, a third when your job goes on the bench, and the rest when it is fitted and you are happy.'],
                ['question' => 'Can we visit the workshop?', 'answer' => 'Yes. We hold an open day on the first Saturday of each month, or book a time and see your own job being made.'],
            ])),
        ];
    }
}

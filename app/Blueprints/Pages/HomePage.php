<?php

declare(strict_types=1);

namespace App\Blueprints\Pages;

use App\Blueprints\NorthbaySite;
use FilamentCraft\Sections\Builtin\CtaSection;
use FilamentCraft\Sections\Builtin\GallerySection;
use FilamentCraft\Sections\Builtin\HeroSection;
use FilamentCraft\Sections\Builtin\ShowcaseSection;
use FilamentCraft\Sections\Builtin\TestimonialsSection;
use FilamentCraft\Sections\Builtin\TimelineSection;

final class HomePage extends Page
{
    public function name(): string
    {
        return 'Home';
    }

    public function slug(): string
    {
        return 'home';
    }

    public function isHomepage(): bool
    {
        return true;
    }

    public function description(): string
    {
        return 'Northbay Joinery builds kitchens, staircases, libraries and tables to measure in Leith, Edinburgh, and fits them ourselves.';
    }

    public function sections(): array
    {
        return [
            $this->section(HeroSection::class, [
                'eyebrow' => 'Joiners in Leith since 2011',
                'heading' => 'Made for one room. Built in Leith.',
                'subheading' => 'We draw every piece for the wall it will stand against, build it from Scottish oak and ash in our Leith workshop, and fit it ourselves.',
                'cta_enabled' => true,
                'cta_label' => 'Book a survey',
                'cta_url' => '/contact',
                'cta_secondary_label' => 'See recent work',
                'cta_secondary_url' => '/work',
                'supporting_text' => 'Surveys are free within 40 miles of Edinburgh.',
                'bg_image' => $this->image('workshop-bench'),
                'media_mode' => 'background',
                'layout' => 'spotlight',
                'content_align' => 'start',
                'surface_style' => 'none',
                'shape' => 'clean',
            ], $this->blocks('proof', [
                ['value' => '6', 'label' => 'Joiners, no subcontractors'],
                ['value' => '12–16 wk', 'label' => 'From drawings to fitting'],
                ['value' => '10 yr', 'label' => 'Guarantee on every joint'],
            ]), scheme: NorthbaySite::INK),

            $this->section(ShowcaseSection::class, [
                'eyebrow' => '',
                'title' => 'Four things we make, and nothing else.',
                'intro' => 'Staying narrow is how six people keep the quality where it is. If your job is not on this list, we will tell you who to call.',
                'first_media_side' => 'end',
                'density' => 'airy',
                'shape' => 'layered',
            ], $this->blocks('row', [
                [
                    'eyebrow' => 'Kitchens',
                    'title' => 'Solid timber carcasses, not board with a veneer',
                    'description' => 'Every cabinet is built in oak or ash, jointed and glued, then finished in a hardwax oil you can sand back and re-oil at home.',
                    'bullets' => "Drawn around how you cook\nDovetailed drawers on full-extension runners\nWorktops in timber, stone or steel",
                    'image' => $this->image('kitchen-oak'),
                ],
                [
                    'eyebrow' => 'Staircases',
                    'title' => 'Stairs that stop creaking because nothing moves',
                    'description' => 'Treads housed into the strings and wedged, the way stairs were built before screws and glue blocks took over.',
                    'bullets' => "Straight, winding and spiral\nOak, ash or walnut treads\nBuilding-control drawings included",
                    'image' => $this->image('stair-curve'),
                ],
                [
                    'eyebrow' => 'Libraries and built-ins',
                    'title' => 'Shelving scribed to walls that are never straight',
                    'description' => 'Edinburgh tenements have plaster that wanders by a few centimetres over a wall. We scribe to it on site so the shelves look like they grew there.',
                    'bullets' => "Libraries, alcoves and window seats\nSliding ladders on brass rails\nWardrobes and dressing rooms",
                    'image' => $this->image('library-wall'),
                ],
                [
                    'eyebrow' => 'Tables',
                    'title' => 'One table a month, built from a single tree',
                    'description' => 'We keep boards from the same log together so the grain runs across the whole top. Sizes to order, from a two-seat kitchen table to a four-metre refectory.',
                    'bullets' => "Oak, elm and walnut\nBenches and chairs to match\nOiled or soap finish",
                    'image' => $this->image('table-long'),
                ],
            ])),

            $this->section(TimelineSection::class, [
                'eyebrow' => '',
                'title' => 'How a commission runs.',
                'intro' => 'Four stages, one joiner who stays with your job from the first visit to the last shelf pin.',
                'style' => 'steps',
                'marker' => 'number',
                'align' => 'start',
            ], $this->blocks('step', [
                ['title' => 'Survey', 'description' => 'We measure the room, check walls and floors for level, and talk through how you use the space. Free within 40 miles.'],
                ['title' => 'Drawings and a fixed price', 'description' => 'Scaled drawings, a timber sample and one price that does not move unless you change the design.'],
                ['title' => 'Workshop', 'description' => 'Everything is built and dry-assembled in Leith. You are welcome to visit and see your job on the bench.'],
                ['title' => 'Fitting', 'description' => 'The joiners who built it fit it, usually in three to five days, and leave the room swept.'],
            ])),

            $this->section(GallerySection::class, [
                'eyebrow' => '',
                'title' => 'From the bench this year.',
                'intro' => '',
                'layout' => 'masonry',
                'ratio' => 'adapt',
                'captions' => 'overlay',
                'align' => 'start',
            ], $this->blocks('image', [
                ['image' => $this->image('stair-spiral'), 'caption' => 'Walnut spiral, Stockbridge'],
                ['image' => $this->image('plane-shavings'), 'caption' => 'Flattening a tabletop by hand'],
                ['image' => $this->image('library-ladder'), 'caption' => 'Library with a sliding ladder, Morningside'],
                ['image' => $this->image('table-pedestal'), 'caption' => 'Round walnut table on a fanned base'],
                ['image' => $this->image('kitchen-curve'), 'caption' => 'Curved oak kitchen run, Portobello'],
                ['image' => $this->image('mortise'), 'caption' => 'Mortises for a green-oak porch frame'],
            ])),

            $this->section(TestimonialsSection::class, [
                'eyebrow' => '',
                'title' => 'What people say once the dust has gone.',
                'intro' => '',
                'layout' => 'featured',
                'align' => 'start',
            ], $this->blocks('quote', [
                ['quote' => 'They spent a whole morning measuring a wall I thought was straight. It was not, and the shelves fit it anyway. Four years on, nothing has moved.', 'name' => 'Callum Reid', 'role' => 'Library wall, Marchmont'],
                ['quote' => 'The price we were given at the drawing stage was the price we paid. That has never happened to us with a builder.', 'name' => 'Imran Siddiqui', 'role' => 'Kitchen, Trinity'],
                ['quote' => 'Our stair used to announce everyone who came home late. Now it does not make a sound.', 'name' => 'Duncan Moffat', 'role' => 'Staircase, Leith Links'],
            ])),

            $this->section(CtaSection::class, [
                'badge' => '',
                'heading' => 'Tell us about the room.',
                'subheading' => 'Send a few photos and rough measurements. We reply within two working days with a first idea of cost and a date for a survey.',
                'note' => 'Currently booking fittings from February.',
                'label' => 'Start with a survey',
                'url' => '/contact',
                'layout' => 'split',
                'align' => 'start',
                'shape' => 'clean',
            ], scheme: NorthbaySite::CHALK),
        ];
    }
}

<?php

declare(strict_types=1);

namespace App\Blueprints\Pages;

use FilamentCraft\Sections\Builtin\ContactSection;
use FilamentCraft\Sections\Builtin\LocationsSection;

final class ContactPage extends Page
{
    public function name(): string
    {
        return 'Contact';
    }

    public function slug(): string
    {
        return 'contact';
    }

    public function description(): string
    {
        return 'Book a free survey with Northbay Joinery within 40 miles of Edinburgh, or visit the Leith workshop.';
    }

    public function sections(): array
    {
        return [
            $this->section(ContactSection::class, [
                'heading' => 'Book a survey',
                'subheading' => 'Tell us which room, roughly what you have in mind and where you are. We reply within two working days.',
                'name_label' => 'Your name',
                'email_label' => 'Email',
                'message_label' => 'The room, the idea and your postcode',
                'button_label' => 'Send',
                'success_message' => 'Thank you. One of the joiners will be in touch within two working days.',
            ]),

            $this->section(LocationsSection::class, [
                'eyebrow' => '',
                'title' => 'The workshop.',
                'intro' => 'Visitors are welcome by appointment and on the first Saturday of every month, 10:00 to 14:00.',
                'layout' => 'split',
                'columns' => '1',
                'align' => 'start',
            ], $this->blocks('location', [
                [
                    'name' => 'Northbay Joinery',
                    'lat' => '55.9738',
                    'lng' => '-3.1747',
                    'address' => "Unit 4, Bangor Road\nLeith, Edinburgh EH6 5JX",
                    'phone' => '+44 131 555 0192',
                    'email' => 'workshop@northbayjoinery.example',
                    'hours' => 'Mon–Fri, 7:30–16:30',
                ],
            ])),
        ];
    }
}

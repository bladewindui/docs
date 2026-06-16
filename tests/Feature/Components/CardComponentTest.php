<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class CardComponentTest extends TestCase
{
    public function test_card_renders_default()
    {
        $view = $this->blade('<x-bladewind::card>Card content</x-bladewind::card>');

        $view->assertSee('bw-card', false);
        $view->assertSee('Card content');
    }

    public function test_card_renders_with_title()
    {
        $view = $this->blade('<x-bladewind::card title="My Card">Content</x-bladewind::card>');

        $view->assertSee('My Card');
        $view->assertSee('Content');
    }

    public function test_card_has_shadow_by_default()
    {
        $view = $this->blade('<x-bladewind::card>Content</x-bladewind::card>');

        $view->assertSee('shadow-', false);
    }

    public function test_card_can_hide_shadow()
    {
        $view = $this->blade('<x-bladewind::card has_shadow="false">Content</x-bladewind::card>');

        $view->assertDontSee('shadow-sm shadow-black', false);
    }

    public function test_card_renders_with_hover()
    {
        $view = $this->blade('<x-bladewind::card has_hover="true">Content</x-bladewind::card>');

        $view->assertSee('hover:shadow', false);
    }

    public function test_card_renders_with_compact_mode()
    {
        $view = $this->blade('<x-bladewind::card compact="true">Content</x-bladewind::card>');

        $view->assertSee('p-4', false);
    }

    public function test_card_renders_with_no_padding()
    {
        $view = $this->blade('<x-bladewind::card no_padding="true">Content</x-bladewind::card>');

        $view->assertDontSee('p-6', false);
    }

    public function test_card_renders_with_radius_none()
    {
        $view = $this->blade('<x-bladewind::card radius="none">Content</x-bladewind::card>');

        $view->assertSee('rounded-none', false);
    }

    public function test_card_renders_with_radius_medium()
    {
        $view = $this->blade('<x-bladewind::card radius="medium">Content</x-bladewind::card>');

        $view->assertSee('bw-card', false);
    }

    public function test_card_renders_with_radius_large()
    {
        $view = $this->blade('<x-bladewind::card radius="large">Content</x-bladewind::card>');

        $view->assertSee('bw-card', false);
    }

    public function test_card_renders_with_additional_class()
    {
        $view = $this->blade('<x-bladewind::card class="my-custom">Content</x-bladewind::card>');

        $view->assertSee('my-custom', false);
    }

    public function test_card_renders_with_header_slot()
    {
        $view = $this->blade('
            <x-bladewind::card>
                <x-slot:header>Card Header</x-slot:header>
                Card body
            </x-bladewind::card>
        ');

        $view->assertSee('Card Header');
        $view->assertSee('Card body');
    }

    public function test_card_renders_with_footer_slot()
    {
        $view = $this->blade('
            <x-bladewind::card>
                Card body
                <x-slot:footer>Card Footer</x-slot:footer>
            </x-bladewind::card>
        ');

        $view->assertSee('Card body');
        $view->assertSee('Card Footer');
    }

    public function test_contact_card_renders()
    {
        $view = $this->blade('
            <x-bladewind::contact-card
                name="John Doe"
                position="Developer"
                email="john@example.com"
            />
        ');

        $view->assertSee('bw-contact-card', false);
        $view->assertSee('John Doe');
        $view->assertSee('Developer');
        $view->assertSee('john@example.com');
    }

    public function test_contact_card_renders_with_mobile()
    {
        $view = $this->blade('
            <x-bladewind::contact-card
                name="Jane Doe"
                mobile="+1.234.567.890"
            />
        ');

        $view->assertSee('+1.234.567.890');
    }

    public function test_contact_card_renders_centered()
    {
        $view = $this->blade('
            <x-bladewind::contact-card
                name="Jane"
                centered="true"
            />
        ');

        $view->assertSee('bw-contact-card', false);
    }

    public function test_contact_card_renders_with_department()
    {
        $view = $this->blade('
            <x-bladewind::contact-card
                name="Jane"
                department="Engineering"
            />
        ');

        $view->assertSee('Engineering');
    }

    public function test_contact_card_renders_with_birthday()
    {
        $view = $this->blade('
            <x-bladewind::contact-card
                name="Jane"
                birthday="01-Jan-1990"
            />
        ');

        $view->assertSee('01-Jan-1990');
    }
}

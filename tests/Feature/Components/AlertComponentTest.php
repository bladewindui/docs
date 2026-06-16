<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class AlertComponentTest extends TestCase
{
    public function test_renders_with_default_type()
    {
        $view = $this->blade('<x-bladewind::alert>Default alert</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertSee('Default alert');
    }

    public function test_renders_error_type()
    {
        $view = $this->blade('<x-bladewind::alert type="error">Error alert</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertSee('red-', false);
    }

    public function test_renders_warning_type()
    {
        $view = $this->blade('<x-bladewind::alert type="warning">Warning alert</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertSee('yellow-', false);
    }

    public function test_renders_success_type()
    {
        $view = $this->blade('<x-bladewind::alert type="success">Success alert</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertSee('green-', false);
    }

    public function test_renders_info_type()
    {
        $view = $this->blade('<x-bladewind::alert type="info">Info alert</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertSee('blue-', false);
    }

    public function test_renders_dark_shade()
    {
        $view = $this->blade('<x-bladewind::alert shade="dark">Dark alert</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertSee('bg-blue-500', false);
    }

    public function test_renders_faint_shade()
    {
        $view = $this->blade('<x-bladewind::alert shade="faint">Faint alert</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertSee('bg-blue-100', false);
    }

    public function test_hides_close_icon_when_disabled()
    {
        $view = $this->blade('<x-bladewind::alert show_close_icon="false">No close</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertDontSee('x-mark', false);
    }

    public function test_shows_close_icon_by_default()
    {
        $view = $this->blade('<x-bladewind::alert>Has close</x-bladewind::alert>');

        $view->assertSee("this.parentElement.style.display='none'", false);
    }

    public function test_hides_type_icon_when_disabled()
    {
        $view = $this->blade('<x-bladewind::alert show_icon="false">No icon</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertDontSee('modal-icon', false);
    }

    public function test_renders_with_custom_color()
    {
        $view = $this->blade('<x-bladewind::alert color="pink">Pink alert</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertSee('pink-', false);
    }

    public function test_renders_with_custom_icon()
    {
        $view = $this->blade('<x-bladewind::alert icon="bell-alert">Custom icon alert</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
    }

    public function test_renders_slot_content()
    {
        $view = $this->blade('<x-bladewind::alert>Hello World</x-bladewind::alert>');

        $view->assertSee('Hello World');
    }

    public function test_renders_with_additional_class()
    {
        $view = $this->blade('<x-bladewind::alert class="my-custom-class">Alert</x-bladewind::alert>');

        $view->assertSee('my-custom-class', false);
    }

    public function test_renders_with_cyan_color()
    {
        $view = $this->blade('<x-bladewind::alert color="cyan">Cyan alert</x-bladewind::alert>');

        $view->assertSee('cyan-', false);
    }

    public function test_renders_with_purple_color()
    {
        $view = $this->blade('<x-bladewind::alert color="purple">Purple alert</x-bladewind::alert>');

        $view->assertSee('purple-', false);
    }

    public function test_renders_with_orange_color()
    {
        $view = $this->blade('<x-bladewind::alert color="orange">Orange alert</x-bladewind::alert>');

        $view->assertSee('orange-', false);
    }

    public function test_renders_transparent_color()
    {
        $view = $this->blade('<x-bladewind::alert color="transparent">Transparent alert</x-bladewind::alert>');

        $view->assertSee('bw-alert', false);
        $view->assertSee('bg-transparent', false);
    }
}

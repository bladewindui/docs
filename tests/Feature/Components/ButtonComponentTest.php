<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class ButtonComponentTest extends TestCase
{
    public function test_renders_as_button_tag_by_default()
    {
        $view = $this->blade('<x-bladewind::button>Click Me</x-bladewind::button>');

        $view->assertSee('<button', false);
        $view->assertSee('bw-button', false);
        $view->assertSee('Click Me');
    }

    public function test_renders_type_button_by_default()
    {
        $view = $this->blade('<x-bladewind::button>Click Me</x-bladewind::button>');

        // Blade escapes attribute values — type="button" becomes type=&quot;button&quot;
        $view->assertSee('type=&quot;button&quot;', false);
    }

    public function test_renders_submit_when_can_submit_is_true()
    {
        $view = $this->blade('<x-bladewind::button can_submit="true">Submit</x-bladewind::button>');

        $view->assertSee('type=&quot;submit&quot;', false);
    }

    public function test_renders_secondary_type()
    {
        $view = $this->blade('<x-bladewind::button type="secondary">Secondary</x-bladewind::button>');

        $view->assertSee('secondary', false);
    }

    public function test_renders_disabled_state()
    {
        $view = $this->blade('<x-bladewind::button disabled="true">Disabled</x-bladewind::button>');

        $view->assertSee('disabled', false);
    }

    public function test_renders_as_anchor_tag()
    {
        $view = $this->blade('<x-bladewind::button tag="a" href="/pricing">Link Button</x-bladewind::button>');

        $view->assertSee('<a', false);
        $view->assertSee('bw-button', false);
    }

    public function test_renders_with_spinner_when_has_spinner_is_true()
    {
        $view = $this->blade('<x-bladewind::button has_spinner="true">With Spinner</x-bladewind::button>');

        $view->assertSee('bw-spinner', false);
    }

    public function test_spinner_is_hidden_by_default()
    {
        $view = $this->blade('<x-bladewind::button has_spinner="true">Spinner Button</x-bladewind::button>');

        $view->assertSee('hidden', false);
    }

    public function test_spinner_visible_when_show_spinner_true()
    {
        $view = $this->blade('<x-bladewind::button has_spinner="true" show_spinner="true">Loading</x-bladewind::button>');

        $view->assertDontSee('hidden', false);
    }

    public function test_renders_with_icon()
    {
        $view = $this->blade('<x-bladewind::button icon="bell-alert">With Icon</x-bladewind::button>');

        $view->assertSee('bw-button', false);
        $view->assertSee('has-icon', false);
    }

    public function test_renders_outline()
    {
        $view = $this->blade('<x-bladewind::button outline="true">Outline</x-bladewind::button>');

        $view->assertSee('outlined', false);
    }

    public function test_renders_with_size_big()
    {
        $view = $this->blade('<x-bladewind::button size="big">Big Button</x-bladewind::button>');

        $view->assertSee('big', false);
    }

    public function test_renders_with_size_tiny()
    {
        $view = $this->blade('<x-bladewind::button size="tiny">Tiny Button</x-bladewind::button>');

        $view->assertSee('tiny', false);
    }

    public function test_renders_with_size_small()
    {
        $view = $this->blade('<x-bladewind::button size="small">Small Button</x-bladewind::button>');

        $view->assertSee('small', false);
    }

    public function test_renders_with_size_medium()
    {
        $view = $this->blade('<x-bladewind::button size="medium">Medium Button</x-bladewind::button>');

        $view->assertSee('medium', false);
    }

    public function test_renders_with_radius_none()
    {
        $view = $this->blade('<x-bladewind::button radius="none">Square Button</x-bladewind::button>');

        $view->assertSee('rounded-none', false);
    }

    public function test_renders_with_radius_full()
    {
        $view = $this->blade('<x-bladewind::button radius="full">Pill Button</x-bladewind::button>');

        $view->assertSee('rounded-full', false);
    }

    public function test_renders_with_custom_name_class()
    {
        $view = $this->blade('<x-bladewind::button name="my-button">Named</x-bladewind::button>');

        $view->assertSee('my-button', false);
    }

    public function test_renders_with_red_color()
    {
        $view = $this->blade('<x-bladewind::button color="red">Red Button</x-bladewind::button>');

        $view->assertSee('red-', false);
    }

    public function test_renders_without_uppercase()
    {
        $view = $this->blade('<x-bladewind::button uppercasing="false">lowercase</x-bladewind::button>');

        $view->assertDontSee('uppercase', false);
    }

    public function test_renders_circle_button()
    {
        $view = $this->blade('<x-bladewind::button.circle icon="bell-alert" />');

        $view->assertSee('bw-button-circle', false);
    }

    public function test_renders_circle_with_outline()
    {
        $view = $this->blade('<x-bladewind::button.circle outline="true" icon="bell-alert" />');

        $view->assertSee('bw-button-circle', false);
        $view->assertSee('outlined', false);
    }

    public function test_renders_without_focus_ring()
    {
        $view = $this->blade('<x-bladewind::button show_focus_ring="false">No Ring</x-bladewind::button>');

        $view->assertSee('focus:ring-0', false);
    }

    public function test_renders_icon_on_right()
    {
        $view = $this->blade('<x-bladewind::button icon="arrow-right" icon_right="true">Next</x-bladewind::button>');

        $view->assertSee('bw-button', false);
        $view->assertSee('has-icon', false);
    }
}

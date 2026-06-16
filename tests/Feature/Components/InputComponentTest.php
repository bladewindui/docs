<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class InputComponentTest extends TestCase
{
    public function test_input_renders_default()
    {
        $view = $this->blade('<x-bladewind::input />');

        $view->assertSee('<input', false);
        $view->assertSee('type="text"', false);
    }

    public function test_input_renders_with_placeholder()
    {
        $view = $this->blade('<x-bladewind::input placeholder="Enter name" />');

        $view->assertSee('Enter name');
    }

    public function test_input_renders_with_label()
    {
        $view = $this->blade('<x-bladewind::input label="Full Name" />');

        $view->assertSee('Full Name');
    }

    public function test_input_renders_password_type()
    {
        $view = $this->blade('<x-bladewind::input type="password" />');

        $view->assertSee('type="password"', false);
    }

    public function test_input_renders_email_type()
    {
        $view = $this->blade('<x-bladewind::input type="email" />');

        $view->assertSee('type="email"', false);
    }

    public function test_input_renders_required_indicator()
    {
        $view = $this->blade('<x-bladewind::input required="true" label="Name" />');

        // Required indicator renders as an inline SVG star, not a literal '*'
        $view->assertSee('!text-red-400', false);
    }

    public function test_input_renders_with_selected_value()
    {
        $view = $this->blade('<x-bladewind::input selected_value="John Doe" />');

        $view->assertSee('John Doe');
    }

    public function test_input_renders_with_prefix()
    {
        $view = $this->blade('<x-bladewind::input prefix="https://" />');

        $view->assertSee('https://');
    }

    public function test_input_renders_with_suffix()
    {
        $view = $this->blade('<x-bladewind::input suffix="@gmail.com" />');

        $view->assertSee('@gmail.com');
    }

    public function test_input_renders_password_viewable_eye()
    {
        $view = $this->blade('<x-bladewind::input type="password" viewable="true" />');

        // Eye icon renders as inline SVG via togglePassword JS function
        $view->assertSee('togglePassword', false);
    }

    public function test_input_renders_clearable_button()
    {
        $view = $this->blade('<x-bladewind::input clearable="true" />');

        // Clear button triggers makeClearable JS function (SVG X, no icon name)
        $view->assertSee('makeClearable', false);
    }

    public function test_input_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::input name="first_name" />');

        $view->assertSee('first_name', false);
    }

    public function test_input_renders_with_error_message()
    {
        $view = $this->blade('<x-bladewind::input error_message="This field is required" />');

        $view->assertSee('This field is required');
    }

    public function test_input_renders_with_size_big()
    {
        $view = $this->blade('<x-bladewind::input size="big" />');

        $view->assertSee('<input', false);
    }

    public function test_input_renders_with_size_small()
    {
        $view = $this->blade('<x-bladewind::input size="small" />');

        $view->assertSee('<input', false);
    }

    public function test_input_with_prefix_icon()
    {
        $view = $this->blade('<x-bladewind::input prefix="magnifying-glass" prefix_is_icon="true" />');

        $view->assertSee('<input', false);
    }

    public function test_input_with_suffix_icon()
    {
        $view = $this->blade('<x-bladewind::input suffix="lock-closed" suffix_is_icon="true" />');

        $view->assertSee('<input', false);
    }

    public function test_input_with_numeric()
    {
        $view = $this->blade('<x-bladewind::input numeric="true" />');

        $view->assertSee('<input', false);
    }

    public function test_input_with_tel_type()
    {
        $view = $this->blade('<x-bladewind::input type="tel" />');

        $view->assertSee('type="tel"', false);
    }

    public function test_input_with_search_type()
    {
        $view = $this->blade('<x-bladewind::input type="search" />');

        $view->assertSee('type="search"', false);
    }

    public function test_input_without_clearing()
    {
        $view = $this->blade('<x-bladewind::input add_clearing="false" />');

        $view->assertSee('<input', false);
    }

    public function test_input_inline_error_display()
    {
        $view = $this->blade('<x-bladewind::input show_error_inline="true" error_message="Required" />');

        $view->assertSee('Required');
    }
}

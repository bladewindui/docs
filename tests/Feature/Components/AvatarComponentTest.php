<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class AvatarComponentTest extends TestCase
{
    public function test_avatar_renders_default()
    {
        $view = $this->blade('<x-bladewind::avatar />');

        $view->assertSee('bw-avatar', false);
    }

    public function test_avatar_renders_with_image()
    {
        $view = $this->blade('<x-bladewind::avatar image="/images/jane.jpg" />');

        $view->assertSee('<img', false);
        $view->assertSee('/images/jane.jpg', false);
    }

    public function test_avatar_renders_with_size_big()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" size="big" />');

        $view->assertSee('size-16', false);
    }

    public function test_avatar_renders_with_size_tiny()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" size="tiny" />');

        $view->assertSee('size-6', false);
    }

    public function test_avatar_renders_with_size_small()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" size="small" />');

        $view->assertSee('size-8', false);
    }

    public function test_avatar_renders_with_size_huge()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" size="huge" />');

        $view->assertSee('size-20', false);
    }

    public function test_avatar_renders_label_when_image_is_short_string()
    {
        $view = $this->blade('<x-bladewind::avatar image="MK" />');

        $view->assertSee('MK');
        $view->assertDontSee('<img', false);
    }

    public function test_avatar_renders_dot_when_dotted()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" dotted="true" />');

        $view->assertSee('border-2 border-white', false);
    }

    public function test_avatar_does_not_show_dot_by_default()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" />');

        $view->assertDontSee('border-2 border-white', false);
    }

    public function test_avatar_renders_with_dot_color_red()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" dotted="true" dot_color="red" />');

        $view->assertSee('bg-red-500', false);
    }

    public function test_avatar_renders_dot_at_top_position()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" dotted="true" dot_position="top" />');

        $view->assertSee('-top-1', false);
    }

    public function test_avatar_renders_dot_at_bottom_position()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" dotted="true" dot_position="bottom" />');

        $view->assertSee('-bottom-1', false);
    }

    public function test_avatar_hides_ring_when_show_ring_false()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" show_ring="false" />');

        $view->assertDontSee('ring-2', false);
    }

    public function test_avatar_shows_ring_by_default()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" />');

        $view->assertSee('ring-2', false);
    }

    public function test_avatars_group_renders()
    {
        $view = $this->blade('
            <x-bladewind::avatars>
                <x-bladewind::avatar image="/img/a.jpg" />
                <x-bladewind::avatar image="/img/b.jpg" />
            </x-bladewind::avatars>
        ');

        $view->assertSee('bw-avatar', false);
    }

    public function test_avatars_group_renders_stacked()
    {
        $view = $this->blade('
            <x-bladewind::avatars stacked="true">
                <x-bladewind::avatar image="/img/a.jpg" />
            </x-bladewind::avatars>
        ');

        $view->assertSee('bw-avatar', false);
        $view->assertSee('-mr-3', false);
    }

    public function test_avatars_group_renders_plus_indicator()
    {
        $view = $this->blade('
            <x-bladewind::avatars plus="5">
                <x-bladewind::avatar image="/img/a.jpg" />
            </x-bladewind::avatars>
        ');

        $view->assertSee('+5');
    }

    public function test_avatars_group_renders_dotted()
    {
        $view = $this->blade('
            <x-bladewind::avatars dotted="true">
                <x-bladewind::avatar image="/img/a.jpg" />
            </x-bladewind::avatars>
        ');

        $view->assertSee('border-2 border-white', false);
    }

    public function test_avatar_with_bg_color()
    {
        $view = $this->blade('<x-bladewind::avatar image="JD" bg_color="blue" />');

        $view->assertSee('blue-', false);
    }

    public function test_avatar_renders_with_size_medium()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" size="medium" />');

        $view->assertSee('size-10', false);
    }

    public function test_avatar_renders_with_size_omg()
    {
        $view = $this->blade('<x-bladewind::avatar image="/img/a.jpg" size="omg" />');

        $view->assertSee('size-28', false);
    }

    public function test_avatar_group_renders_with_dot_color()
    {
        $view = $this->blade('
            <x-bladewind::avatars dotted="true" dot_color="red">
                <x-bladewind::avatar image="/img/a.jpg" />
            </x-bladewind::avatars>
        ');

        $view->assertSee('bg-red-500', false);
    }
}

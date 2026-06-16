<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class NavigationComponentsTest extends TestCase
{
    // ── Icon ─────────────────────────────────────────────────────────────────

    public function test_icon_renders_default()
    {
        $view = $this->blade('<x-bladewind::icon name="bell" />');

        $view->assertSee('<svg', false);
    }

    public function test_icon_renders_solid_type()
    {
        $view = $this->blade('<x-bladewind::icon name="bell" type="solid" />');

        $view->assertSee('<svg', false);
    }

    public function test_icon_renders_outline_type()
    {
        $view = $this->blade('<x-bladewind::icon name="bell" type="outline" />');

        $view->assertSee('<svg', false);
    }

    public function test_icon_renders_with_custom_class()
    {
        $view = $this->blade('<x-bladewind::icon name="bell" class="h-10 w-10 text-red-500" />');

        $view->assertSee('h-10', false);
        $view->assertSee('text-red-500', false);
    }

    public function test_icon_renders_heart_icon()
    {
        $view = $this->blade('<x-bladewind::icon name="heart" />');

        $view->assertSee('<svg', false);
    }

    public function test_icon_renders_user_icon()
    {
        $view = $this->blade('<x-bladewind::icon name="user" />');

        $view->assertSee('<svg', false);
    }

    // ── Bell ─────────────────────────────────────────────────────────────────

    public function test_bell_renders_default()
    {
        $view = $this->blade('<x-bladewind::bell />');

        $view->assertSee('bw-bell', false);
    }

    public function test_bell_renders_without_dot()
    {
        $view = $this->blade('<x-bladewind::bell show_dot="false" />');

        $view->assertSee('bw-bell', false);
        $view->assertDontSee('bw-dot', false);
    }

    public function test_bell_renders_with_dot_color_red()
    {
        $view = $this->blade('<x-bladewind::bell color="red" />');

        $view->assertSee('red-', false);
    }

    public function test_bell_renders_big_size()
    {
        $view = $this->blade('<x-bladewind::bell size="big" />');

        $view->assertSee('bw-bell', false);
    }

    public function test_bell_renders_with_animated_dot()
    {
        $view = $this->blade('<x-bladewind::bell animate_dot="true" />');

        $view->assertSee('bw-bell', false);
    }

    public function test_bell_renders_inverted()
    {
        $view = $this->blade('<x-bladewind::bell invert="true" />');

        $view->assertSee('bw-bell', false);
    }

    // ── Dropmenu ─────────────────────────────────────────────────────────────

    public function test_dropmenu_renders_default()
    {
        $view = $this->blade('
            <x-bladewind::dropmenu>
                <x-bladewind::dropmenu.item>Menu Item</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        ');

        $view->assertSee('bw-dropmenu', false);
        $view->assertSee('Menu Item');
    }

    public function test_dropmenu_renders_with_divided_items()
    {
        $view = $this->blade('
            <x-bladewind::dropmenu divided="true">
                <x-bladewind::dropmenu.item>Item A</x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item>Item B</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        ');

        $view->assertSee('Item A');
        $view->assertSee('Item B');
    }

    public function test_dropmenu_renders_with_icon_trigger()
    {
        $view = $this->blade('
            <x-bladewind::dropmenu trigger="ellipsis-vertical-icon">
                <x-bladewind::dropmenu.item>Action</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        ');

        $view->assertSee('bw-dropmenu', false);
    }

    public function test_dropmenu_renders_positioned_left()
    {
        $view = $this->blade('
            <x-bladewind::dropmenu position="left">
                <x-bladewind::dropmenu.item>Left Item</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        ');

        $view->assertSee('bw-dropmenu', false);
    }

    public function test_dropmenu_renders_scrollable()
    {
        $view = $this->blade('
            <x-bladewind::dropmenu scrollable="true" height="200">
                <x-bladewind::dropmenu.item>Scroll Item</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        ');

        $view->assertSee('bw-dropmenu', false);
    }

    public function test_dropmenu_item_renders_with_icon()
    {
        $view = $this->blade('
            <x-bladewind::dropmenu>
                <x-bladewind::dropmenu.item icon="pencil-square">Edit</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        ');

        $view->assertSee('Edit');
    }

    public function test_dropmenu_item_renders_as_divider()
    {
        $view = $this->blade('
            <x-bladewind::dropmenu>
                <x-bladewind::dropmenu.item>Item</x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item divider="true" />
                <x-bladewind::dropmenu.item>Other Item</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        ');

        $view->assertSee('Item');
        $view->assertSee('Other Item');
    }

    public function test_dropmenu_item_renders_as_header()
    {
        $view = $this->blade('
            <x-bladewind::dropmenu>
                <x-bladewind::dropmenu.item header="true">Section Title</x-bladewind::dropmenu.item>
                <x-bladewind::dropmenu.item>Action</x-bladewind::dropmenu.item>
            </x-bladewind::dropmenu>
        ');

        $view->assertSee('Section Title');
    }

    // ── Theme Switcher ───────────────────────────────────────────────────────

    public function test_theme_switcher_renders_default()
    {
        $view = $this->blade('<x-bladewind::theme-switcher />');

        $view->assertSee('Light');
        $view->assertSee('Dark');
        $view->assertSee('System');
    }

    public function test_theme_switcher_renders_custom_text()
    {
        $view = $this->blade('
            <x-bladewind::theme-switcher
                light_text="Day Mode"
                dark_text="Night Mode"
                system_text="Auto"
            />
        ');

        $view->assertSee('Day Mode');
        $view->assertSee('Night Mode');
        $view->assertSee('Auto');
    }

    public function test_theme_switcher_renders_icon_on_left()
    {
        $view = $this->blade('<x-bladewind::theme-switcher icon_right="false" />');

        $view->assertSee('Light');
        $view->assertSee('Dark');
    }

    public function test_theme_switcher_renders_with_solid_icons()
    {
        $view = $this->blade('<x-bladewind::theme-switcher icon_type="solid" />');

        $view->assertSee('Light');
    }

    // ── Checkcards ───────────────────────────────────────────────────────────

    public function test_checkcards_renders_default()
    {
        $view = $this->blade('
            <x-bladewind::checkcards name="plan">
                <x-bladewind::checkcards.card title="Basic" value="basic">Basic plan</x-bladewind::checkcards.card>
                <x-bladewind::checkcards.card title="Pro" value="pro">Pro plan</x-bladewind::checkcards.card>
            </x-bladewind::checkcards>
        ');

        $view->assertSee('bw-checkcards', false);
        $view->assertSee('Basic');
        $view->assertSee('Pro');
    }

    public function test_checkcards_renders_with_color()
    {
        $view = $this->blade('
            <x-bladewind::checkcards name="hosting" color="blue">
                <x-bladewind::checkcards.card title="AWS" value="aws">AWS</x-bladewind::checkcards.card>
            </x-bladewind::checkcards>
        ');

        $view->assertSee('bw-checkcards', false);
    }

    public function test_checkcards_renders_compact()
    {
        $view = $this->blade('
            <x-bladewind::checkcards name="size" compact="true">
                <x-bladewind::checkcards.card title="S" value="s">Small</x-bladewind::checkcards.card>
            </x-bladewind::checkcards>
        ');

        $view->assertSee('Small');
    }

    public function test_checkcards_renders_with_selected_value()
    {
        $view = $this->blade('
            <x-bladewind::checkcards name="choice" selected_value="b">
                <x-bladewind::checkcards.card title="Option A" value="a">A</x-bladewind::checkcards.card>
                <x-bladewind::checkcards.card title="Option B" value="b">B</x-bladewind::checkcards.card>
            </x-bladewind::checkcards>
        ');

        $view->assertSee('Option A');
        $view->assertSee('Option B');
    }

    public function test_checkcards_renders_with_max()
    {
        $view = $this->blade('
            <x-bladewind::checkcards name="multi" max="2">
                <x-bladewind::checkcards.card title="A" value="a">A</x-bladewind::checkcards.card>
                <x-bladewind::checkcards.card title="B" value="b">B</x-bladewind::checkcards.card>
                <x-bladewind::checkcards.card title="C" value="c">C</x-bladewind::checkcards.card>
            </x-bladewind::checkcards>
        ');

        $view->assertSee('A');
        $view->assertSee('B');
        $view->assertSee('C');
    }

    // ── Checkcard item with icon/avatar ──────────────────────────────────────

    public function test_checkcard_renders_with_icon()
    {
        $view = $this->blade('
            <x-bladewind::checkcards name="srv">
                <x-bladewind::checkcards.card title="Cloud" value="cloud" icon="cloud">Cloud</x-bladewind::checkcards.card>
            </x-bladewind::checkcards>
        ');

        $view->assertSee('Cloud');
    }

    public function test_checkcard_renders_with_avatar_label()
    {
        $view = $this->blade('
            <x-bladewind::checkcards name="team">
                <x-bladewind::checkcards.card title="Alice" value="alice" avatar="AL">Alice</x-bladewind::checkcards.card>
            </x-bladewind::checkcards>
        ');

        $view->assertSee('Alice');
        $view->assertSee('AL');
    }
}

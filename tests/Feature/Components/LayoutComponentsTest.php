<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class LayoutComponentsTest extends TestCase
{
    // ── Accordion ────────────────────────────────────────────────────────────

    public function test_accordion_renders_default()
    {
        $view = $this->blade('
            <x-bladewind::accordion>
                <x-bladewind::accordion.item title="Item 1">Content 1</x-bladewind::accordion.item>
            </x-bladewind::accordion>
        ');

        $view->assertSee('bw-accordion', false);
        $view->assertSee('Item 1');
        $view->assertSee('Content 1');
    }

    public function test_accordion_renders_ungrouped()
    {
        $view = $this->blade('
            <x-bladewind::accordion grouped="false">
                <x-bladewind::accordion.item title="Solo Item">Content</x-bladewind::accordion.item>
            </x-bladewind::accordion>
        ');

        $view->assertSee('Solo Item');
    }

    public function test_accordion_item_renders_open()
    {
        $view = $this->blade('
            <x-bladewind::accordion>
                <x-bladewind::accordion.item title="Open Item" open="true">Open content</x-bladewind::accordion.item>
            </x-bladewind::accordion>
        ');

        $view->assertSee('Open Item');
        $view->assertSee('Open content');
    }

    public function test_accordion_renders_with_color()
    {
        $view = $this->blade('
            <x-bladewind::accordion grouped="false" color="blue">
                <x-bladewind::accordion.item title="Blue" color="blue">Blue content</x-bladewind::accordion.item>
            </x-bladewind::accordion>
        ');

        $view->assertSee('blue', false);
    }

    public function test_accordion_renders_multiple_items()
    {
        $view = $this->blade('
            <x-bladewind::accordion>
                <x-bladewind::accordion.item title="First">First content</x-bladewind::accordion.item>
                <x-bladewind::accordion.item title="Second">Second content</x-bladewind::accordion.item>
            </x-bladewind::accordion>
        ');

        $view->assertSee('First');
        $view->assertSee('Second');
    }

    // ── Tab ──────────────────────────────────────────────────────────────────

    public function test_tab_renders_default()
    {
        $view = $this->blade('
            <x-bladewind::tab>
                <x-slot name="headings">
                    <x-bladewind::tab.heading name="tab1" label="Tab One" active="true" />
                </x-slot>
                <x-bladewind::tab.body>
                    <x-bladewind::tab.content name="tab1" active="true">Tab content</x-bladewind::tab.content>
                </x-bladewind::tab.body>
            </x-bladewind::tab>
        ');

        $view->assertSee('Tab One');
        $view->assertSee('Tab content');
    }

    public function test_tab_renders_multiple_tabs()
    {
        $view = $this->blade('
            <x-bladewind::tab>
                <x-slot name="headings">
                    <x-bladewind::tab.heading name="t1" label="First Tab" active="true" />
                    <x-bladewind::tab.heading name="t2" label="Second Tab" />
                </x-slot>
                <x-bladewind::tab.body>
                    <x-bladewind::tab.content name="t1" active="true">First content</x-bladewind::tab.content>
                    <x-bladewind::tab.content name="t2">Second content</x-bladewind::tab.content>
                </x-bladewind::tab.body>
            </x-bladewind::tab>
        ');

        $view->assertSee('First Tab');
        $view->assertSee('Second Tab');
    }

    public function test_tab_renders_system_style()
    {
        $view = $this->blade('
            <x-bladewind::tab style="system">
                <x-slot name="headings">
                    <x-bladewind::tab.heading name="s1" label="System Tab" active="true" />
                </x-slot>
                <x-bladewind::tab.body>
                    <x-bladewind::tab.content name="s1" active="true">Content</x-bladewind::tab.content>
                </x-bladewind::tab.body>
            </x-bladewind::tab>
        ');

        $view->assertSee('System Tab');
    }

    public function test_tab_renders_pills_style()
    {
        $view = $this->blade('
            <x-bladewind::tab style="pills">
                <x-slot name="headings">
                    <x-bladewind::tab.heading name="p1" label="Pill Tab" active="true" />
                </x-slot>
                <x-bladewind::tab.body>
                    <x-bladewind::tab.content name="p1" active="true">Pill content</x-bladewind::tab.content>
                </x-bladewind::tab.body>
            </x-bladewind::tab>
        ');

        $view->assertSee('Pill Tab');
    }

    public function test_tab_heading_renders_disabled()
    {
        $view = $this->blade('
            <x-bladewind::tab>
                <x-slot name="headings">
                    <x-bladewind::tab.heading name="d1" label="Disabled Tab" disabled="true" />
                    <x-bladewind::tab.heading name="d2" label="Active Tab" active="true" />
                </x-slot>
                <x-bladewind::tab.body>
                    <x-bladewind::tab.content name="d2" active="true">Content</x-bladewind::tab.content>
                </x-bladewind::tab.body>
            </x-bladewind::tab>
        ');

        $view->assertSee('Disabled Tab');
        $view->assertSee('disabled', false);
    }

    public function test_tab_renders_with_color()
    {
        $view = $this->blade('
            <x-bladewind::tab color="red">
                <x-slot name="headings">
                    <x-bladewind::tab.heading name="r1" label="Red Tab" active="true" />
                </x-slot>
                <x-bladewind::tab.body>
                    <x-bladewind::tab.content name="r1" active="true">Red content</x-bladewind::tab.content>
                </x-bladewind::tab.body>
            </x-bladewind::tab>
        ');

        $view->assertSee('red', false);
    }

    // ── Centered Content ─────────────────────────────────────────────────────

    public function test_centered_content_renders_default()
    {
        $view = $this->blade('<x-bladewind::centered-content>Inner</x-bladewind::centered-content>');

        $view->assertSee('Inner');
    }

    public function test_centered_content_renders_with_size_small()
    {
        $view = $this->blade('<x-bladewind::centered-content size="small">Small</x-bladewind::centered-content>');

        $view->assertSee('Small');
    }

    public function test_centered_content_renders_with_size_medium()
    {
        $view = $this->blade('<x-bladewind::centered-content size="medium">Medium</x-bladewind::centered-content>');

        $view->assertSee('Medium');
    }

    public function test_centered_content_renders_with_size_big()
    {
        $view = $this->blade('<x-bladewind::centered-content size="big">Big</x-bladewind::centered-content>');

        $view->assertSee('Big');
    }

    // ── List View ────────────────────────────────────────────────────────────

    public function test_listview_renders_default()
    {
        $view = $this->blade('
            <x-bladewind::listview>
                <x-bladewind::listview.item>Item A</x-bladewind::listview.item>
            </x-bladewind::listview>
        ');

        // listview renders as <ul role="list">, no bw-listview class
        $view->assertSee('role="list"', false);
        $view->assertSee('Item A');
    }

    public function test_listview_renders_compact()
    {
        $view = $this->blade('
            <x-bladewind::listview compact="true">
                <x-bladewind::listview.item>Compact Item</x-bladewind::listview.item>
            </x-bladewind::listview>
        ');

        $view->assertSee('Compact Item');
    }

    public function test_listview_renders_transparent()
    {
        $view = $this->blade('
            <x-bladewind::listview transparent="true">
                <x-bladewind::listview.item>Transparent Item</x-bladewind::listview.item>
            </x-bladewind::listview>
        ');

        $view->assertSee('Transparent Item');
    }

    public function test_listview_renders_multiple_items()
    {
        $view = $this->blade('
            <x-bladewind::listview>
                <x-bladewind::listview.item>Item 1</x-bladewind::listview.item>
                <x-bladewind::listview.item>Item 2</x-bladewind::listview.item>
                <x-bladewind::listview.item>Item 3</x-bladewind::listview.item>
            </x-bladewind::listview>
        ');

        $view->assertSee('Item 1');
        $view->assertSee('Item 2');
        $view->assertSee('Item 3');
    }

    // ── Timeline ─────────────────────────────────────────────────────────────

    public function test_timeline_renders_default()
    {
        $view = $this->blade('
            <x-bladewind::timelines>
                <x-bladewind::timeline date="Jan 2024" content="Event occurred" />
            </x-bladewind::timelines>
        ');

        $view->assertSee('Jan 2024');
        $view->assertSee('Event occurred');
    }

    public function test_timeline_renders_stacked()
    {
        $view = $this->blade('
            <x-bladewind::timelines stacked="true">
                <x-bladewind::timeline date="Feb 2024" content="Stacked event" />
            </x-bladewind::timelines>
        ');

        $view->assertSee('Feb 2024');
        $view->assertSee('Stacked event');
    }

    public function test_timeline_renders_completed()
    {
        $view = $this->blade('
            <x-bladewind::timelines completed="true">
                <x-bladewind::timeline date="Mar 2024" content="Done" completed="true" />
            </x-bladewind::timelines>
        ');

        $view->assertSee('Done');
    }

    public function test_timeline_renders_with_color()
    {
        $view = $this->blade('
            <x-bladewind::timelines color="pink">
                <x-bladewind::timeline date="Apr 2024" content="Pink event" color="pink" />
            </x-bladewind::timelines>
        ');

        $view->assertSee('Apr 2024');
        $view->assertSee('pink', false);
    }

    public function test_timeline_renders_with_big_anchor()
    {
        $view = $this->blade('
            <x-bladewind::timelines anchor="big">
                <x-bladewind::timeline date="May 2024" content="Big anchor" anchor="big" />
            </x-bladewind::timelines>
        ');

        $view->assertSee('May 2024');
    }

    public function test_timeline_renders_multiple_items()
    {
        $view = $this->blade('
            <x-bladewind::timelines>
                <x-bladewind::timeline date="Step 1" content="First step" />
                <x-bladewind::timeline date="Step 2" content="Second step" />
                <x-bladewind::timeline date="Step 3" content="Third step" last="true" />
            </x-bladewind::timelines>
        ');

        $view->assertSee('First step');
        $view->assertSee('Second step');
        $view->assertSee('Third step');
    }
}

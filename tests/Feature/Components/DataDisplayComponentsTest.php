<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class DataDisplayComponentsTest extends TestCase
{
    // ── Table ────────────────────────────────────────────────────────────────

    public function test_table_renders_default()
    {
        $view = $this->blade('
            <x-bladewind::table>
                <x-slot name="header">
                    <th>Name</th>
                    <th>Email</th>
                </x-slot>
                <tr>
                    <td>John</td>
                    <td>john@example.com</td>
                </tr>
            </x-bladewind::table>
        ');

        $view->assertSee('<table', false);
        $view->assertSee('Name');
        $view->assertSee('John');
    }

    public function test_table_renders_striped()
    {
        $view = $this->blade('
            <x-bladewind::table striped="true">
                <x-slot name="header"><th>Col</th></x-slot>
                <tr><td>Row</td></tr>
            </x-bladewind::table>
        ');

        $view->assertSee('striped', false);
    }

    public function test_table_renders_without_dividers()
    {
        $view = $this->blade('
            <x-bladewind::table divided="false">
                <x-slot name="header"><th>Col</th></x-slot>
                <tr><td>Row</td></tr>
            </x-bladewind::table>
        ');

        $view->assertSee('<table', false);
    }

    public function test_table_renders_with_hover()
    {
        $view = $this->blade('
            <x-bladewind::table has_hover="true">
                <x-slot name="header"><th>Col</th></x-slot>
                <tr><td>Row</td></tr>
            </x-bladewind::table>
        ');

        $view->assertSee('with-hover-effect', false);
    }

    public function test_table_renders_compact()
    {
        $view = $this->blade('
            <x-bladewind::table compact="true">
                <x-slot name="header"><th>Col</th></x-slot>
                <tr><td>Row</td></tr>
            </x-bladewind::table>
        ');

        $view->assertSee('<table', false);
    }

    public function test_table_renders_without_shadow()
    {
        $view = $this->blade('
            <x-bladewind::table has_shadow="false">
                <x-slot name="header"><th>Col</th></x-slot>
                <tr><td>Row</td></tr>
            </x-bladewind::table>
        ');

        $view->assertSee('<table', false);
    }

    public function test_table_renders_with_border()
    {
        $view = $this->blade('
            <x-bladewind::table has_border="true">
                <x-slot name="header"><th>Col</th></x-slot>
                <tr><td>Row</td></tr>
            </x-bladewind::table>
        ');

        $view->assertSee('border', false);
    }

    public function test_table_renders_transparent()
    {
        $view = $this->blade('
            <x-bladewind::table transparent="true">
                <x-slot name="header"><th>Col</th></x-slot>
                <tr><td>Row</td></tr>
            </x-bladewind::table>
        ');

        $view->assertSee('<table', false);
    }

    public function test_table_renders_celled()
    {
        $view = $this->blade('
            <x-bladewind::table celled="true">
                <x-slot name="header"><th>Col</th></x-slot>
                <tr><td>Row</td></tr>
            </x-bladewind::table>
        ');

        $view->assertSee('<table', false);
    }

    public function test_table_renders_no_data_message()
    {
        $view = $this->blade('
            <x-bladewind::table :data="[]" no_data_message="No results found" />
        ');

        $view->assertSee('No results found');
    }

    public function test_table_renders_with_dynamic_data()
    {
        $data = json_encode([
            ['name' => 'Alice', 'email' => 'alice@example.com'],
            ['name' => 'Bob', 'email' => 'bob@example.com'],
        ]);

        $view = $this->blade("<x-bladewind::table data='{$data}' />");

        $view->assertSee('Alice');
        $view->assertSee('Bob');
    }

    public function test_table_renders_without_uppercase_headers()
    {
        $view = $this->blade('
            <x-bladewind::table uppercasing="false">
                <x-slot name="header"><th>column name</th></x-slot>
                <tr><td>value</td></tr>
            </x-bladewind::table>
        ');

        $view->assertSee('<table', false);
        $view->assertDontSee('uppercase', false);
    }

    // ── Statistic ────────────────────────────────────────────────────────────

    public function test_statistic_renders_default()
    {
        $view = $this->blade('<x-bladewind::statistic label="Total Users" number="1,234" />');

        $view->assertSee('bw-statistic', false);
        $view->assertSee('Total Users');
        $view->assertSee('1,234');
    }

    public function test_statistic_renders_with_currency()
    {
        $view = $this->blade('<x-bladewind::statistic label="Revenue" number="50,000" currency="USD" />');

        $view->assertSee('Revenue');
        $view->assertSee('USD');
    }

    public function test_statistic_renders_currency_on_right()
    {
        $view = $this->blade('<x-bladewind::statistic label="Sales" number="100" currency="GHS" currency_position="right" />');

        $view->assertSee('GHS');
    }

    public function test_statistic_renders_without_shadow()
    {
        $view = $this->blade('<x-bladewind::statistic label="Orders" number="42" has_shadow="false" />');

        $view->assertSee('bw-statistic', false);
        $view->assertDontSee('shadow-', false);
    }

    public function test_statistic_renders_with_spinner()
    {
        $view = $this->blade('<x-bladewind::statistic label="Loading" number="" show_spinner="true" />');

        $view->assertSee('bw-spinner', false);
    }

    public function test_statistic_renders_label_at_bottom()
    {
        $view = $this->blade('<x-bladewind::statistic label="Total" number="99" label_position="bottom" />');

        $view->assertSee('Total');
        $view->assertSee('99');
    }

    public function test_statistic_renders_without_border()
    {
        $view = $this->blade('<x-bladewind::statistic label="Items" number="10" has_border="false" />');

        $view->assertSee('bw-statistic', false);
    }

    public function test_statistic_renders_icon_on_right()
    {
        $view = $this->blade('
            <x-bladewind::statistic label="Users" number="100" icon_position="right">
                <x-slot name="icon"><svg></svg></x-slot>
            </x-bladewind::statistic>
        ');

        $view->assertSee('bw-statistic', false);
    }

    // ── Progress Bar ─────────────────────────────────────────────────────────

    public function test_progress_bar_renders_default()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="50" />');

        $view->assertSee('bw-progress-bar', false);
    }

    public function test_progress_bar_renders_with_color()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="75" color="red" />');

        $view->assertSee('red-', false);
    }

    public function test_progress_bar_renders_dark_shade()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="60" shade="dark" />');

        $view->assertSee('bw-progress-bar', false);
    }

    public function test_progress_bar_shows_percentage_label()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="40" show_percentage_label="true" />');

        $view->assertSee('40', false);
    }

    public function test_progress_bar_renders_striped()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="70" striped="true" />');

        $view->assertSee('bw-progress-bar', false);
    }

    public function test_progress_bar_renders_animated()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="80" striped="true" animated="true" />');

        $view->assertSee('bw-progress-bar', false);
    }

    public function test_progress_bar_renders_with_prefix_suffix()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="55" show_percentage_label="true" percentage_prefix="uploading: " percentage_suffix=" done" />');

        $view->assertSee('uploading:');
        $view->assertSee('done');
    }

    // ── Progress Circle ──────────────────────────────────────────────────────
    // Note: renders as inline <svg>, no bw-progress-circle class

    public function test_progress_circle_renders_default()
    {
        $view = $this->blade('<x-bladewind::progress-circle percentage="50" />');

        $view->assertSee('<svg', false);
        $view->assertSee('stroke-dashoffset', false);
    }

    public function test_progress_circle_renders_with_color()
    {
        $view = $this->blade('<x-bladewind::progress-circle percentage="75" color="red" />');

        $view->assertSee('<svg', false);
    }

    public function test_progress_circle_shows_label()
    {
        $view = $this->blade('<x-bladewind::progress-circle percentage="60" show_label="true" />');

        $view->assertSee('60', false);
    }

    public function test_progress_circle_shows_percent_sign()
    {
        $view = $this->blade('<x-bladewind::progress-circle percentage="45" show_label="true" show_percent="true" />');

        $view->assertSee('%', false);
    }

    public function test_progress_circle_renders_small_size()
    {
        $view = $this->blade('<x-bladewind::progress-circle percentage="30" size="small" />');

        $view->assertSee('<svg', false);
    }

    public function test_progress_circle_renders_big_size()
    {
        $view = $this->blade('<x-bladewind::progress-circle percentage="30" size="big" />');

        $view->assertSee('<svg', false);
    }

    // ── Horizontal Line Graph ────────────────────────────────────────────────
    // Note: the HLG component reuses the bw-progress-bar container class

    public function test_horizontal_line_graph_renders_default()
    {
        $view = $this->blade('<x-bladewind::horizontal-line-graph percentage="50" />');

        $view->assertSee('bw-progress-bar', false);
        $view->assertSee('bar-width', false);
    }

    public function test_horizontal_line_graph_renders_with_label()
    {
        $view = $this->blade('<x-bladewind::horizontal-line-graph percentage="60" label="Women Farmers" />');

        $view->assertSee('Women Farmers');
    }

    public function test_horizontal_line_graph_renders_with_color()
    {
        $view = $this->blade('<x-bladewind::horizontal-line-graph percentage="70" color="red" />');

        $view->assertSee('red-', false);
    }

    public function test_horizontal_line_graph_renders_dark_shade()
    {
        $view = $this->blade('<x-bladewind::horizontal-line-graph percentage="80" shade="dark" />');

        $view->assertSee('bw-progress-bar', false);
    }

    public function test_horizontal_line_graph_shows_percentage()
    {
        $view = $this->blade('<x-bladewind::horizontal-line-graph percentage="35" />');

        $view->assertSee('35', false);
    }

    // ── Tags ─────────────────────────────────────────────────────────────────
    // Note: tag renders as a <label> element with a dynamic bw-{uniqid} id

    public function test_tag_renders_default()
    {
        $view = $this->blade('<x-bladewind::tag label="PHP" />');

        $view->assertSee('<label', false);
        $view->assertSee('PHP');
    }

    public function test_tag_renders_with_color()
    {
        $view = $this->blade('<x-bladewind::tag label="Laravel" color="red" />');

        $view->assertSee('red-', false);
        $view->assertSee('Laravel');
    }

    public function test_tag_renders_with_close_icon()
    {
        $view = $this->blade('<x-bladewind::tag label="Removable" can_close="true" />');

        // Close icon triggers parentElement removal via inline JS
        $view->assertSee('this.parentElement.remove()', false);
    }

    public function test_tag_renders_dark_shade()
    {
        $view = $this->blade('<x-bladewind::tag label="Dark" shade="dark" />');

        $view->assertSee('<label', false);
        $view->assertSee('Dark');
    }

    public function test_tag_renders_rounded()
    {
        $view = $this->blade('<x-bladewind::tag label="Rounded" rounded="true" />');

        $view->assertSee('rounded-full', false);
    }

    public function test_tag_renders_tiny()
    {
        $view = $this->blade('<x-bladewind::tag label="Tiny" tiny="true" />');

        $view->assertSee('<label', false);
        $view->assertSee('Tiny');
    }

    public function test_tag_renders_outline()
    {
        $view = $this->blade('<x-bladewind::tag label="Outlined" outline="true" />');

        // Outline removes background, keeps border
        $view->assertSee('border border-', false);
    }

    public function test_tags_group_renders()
    {
        $view = $this->blade('
            <x-bladewind::tags name="stack" color="blue">
                <x-bladewind::tag label="Laravel" value="laravel" />
                <x-bladewind::tag label="Vue" value="vue" />
            </x-bladewind::tags>
        ');

        $view->assertSee('Laravel');
        $view->assertSee('Vue');
    }

    public function test_tags_group_renders_selectable()
    {
        $view = $this->blade('
            <x-bladewind::tags name="techs" selected_value="php">
                <x-bladewind::tag label="PHP" value="php" />
                <x-bladewind::tag label="JS" value="js" />
            </x-bladewind::tags>
        ');

        $view->assertSee('PHP');
        $view->assertSee('JS');
    }

    // ── Chart ────────────────────────────────────────────────────────────────
    // Note: chart renders a <canvas> element with a dynamic class, no bw-chart class

    public function test_chart_renders_default()
    {
        $view = $this->blade('<x-bladewind::chart :labels="[\'Jan\', \'Feb\']" :data="[10, 20]" />');

        $view->assertSee('<canvas', false);
        $view->assertSee('new Chart(', false);
    }

    public function test_chart_renders_with_type_line()
    {
        $view = $this->blade('<x-bladewind::chart type="line" :labels="[\'Q1\']" :data="[100]" />');

        $view->assertSee('<canvas', false);
        $view->assertSee("type: 'line'", false);
    }

    public function test_chart_renders_with_type_pie()
    {
        $view = $this->blade('<x-bladewind::chart type="pie" :labels="[\'A\', \'B\']" :data="[30, 70]" />');

        $view->assertSee('<canvas', false);
        $view->assertSee("type: 'pie'", false);
    }

    public function test_chart_renders_with_title()
    {
        $view = $this->blade('<x-bladewind::chart :labels="[\'Jan\']" :data="[5]" title="Sales Chart" />');

        $view->assertSee('<canvas', false);
    }

    public function test_chart_renders_without_legend()
    {
        $view = $this->blade('<x-bladewind::chart :labels="[\'A\']" :data="[1]" show_legend="false" />');

        $view->assertSee('<canvas', false);
        $view->assertSee('"display":false', false);
    }
}

<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class MiscComponentsTest extends TestCase
{
    // ── Accordion (extra attribute coverage) ─────────────────────────────────

    public function test_accordion_allows_opening_multiple()
    {
        $view = $this->blade('
            <x-bladewind::accordion can_open_multiple="true">
                <x-bladewind::accordion.item title="Q1">A1</x-bladewind::accordion.item>
                <x-bladewind::accordion.item title="Q2">A2</x-bladewind::accordion.item>
            </x-bladewind::accordion>
        ');

        $view->assertSee('Q1');
        $view->assertSee('Q2');
    }

    public function test_accordion_no_padding()
    {
        $view = $this->blade('
            <x-bladewind::accordion no_padding="true">
                <x-bladewind::accordion.item title="Tight">Content</x-bladewind::accordion.item>
            </x-bladewind::accordion>
        ');

        $view->assertSee('bw-accordion', false);
    }

    public function test_accordion_item_no_padding()
    {
        $view = $this->blade('
            <x-bladewind::accordion>
                <x-bladewind::accordion.item title="Tight Item" no_padding="true">Content</x-bladewind::accordion.item>
            </x-bladewind::accordion>
        ');

        $view->assertSee('Tight Item');
    }

    // ── Bell (all colors) ────────────────────────────────────────────────────

    public function test_bell_renders_with_green_dot()
    {
        $view = $this->blade('<x-bladewind::bell color="green" />');

        $view->assertSee('green-', false);
    }

    public function test_bell_renders_with_yellow_dot()
    {
        $view = $this->blade('<x-bladewind::bell color="yellow" />');

        $view->assertSee('yellow-', false);
    }

    public function test_bell_renders_with_purple_dot()
    {
        $view = $this->blade('<x-bladewind::bell color="purple" />');

        $view->assertSee('purple-', false);
    }

    public function test_bell_renders_small_size()
    {
        $view = $this->blade('<x-bladewind::bell size="small" />');

        $view->assertSee('bw-bell', false);
    }

    // ── Centered Content (all sizes) ─────────────────────────────────────────

    public function test_centered_content_renders_tiny()
    {
        $view = $this->blade('<x-bladewind::centered-content size="tiny">Tiny</x-bladewind::centered-content>');

        $view->assertSee('Tiny');
    }

    public function test_centered_content_renders_xl()
    {
        $view = $this->blade('<x-bladewind::centered-content size="xl">XL</x-bladewind::centered-content>');

        $view->assertSee('XL');
    }

    public function test_centered_content_renders_xxl()
    {
        $view = $this->blade('<x-bladewind::centered-content size="xxl">XXL</x-bladewind::centered-content>');

        $view->assertSee('XXL');
    }

    public function test_centered_content_renders_omg()
    {
        $view = $this->blade('<x-bladewind::centered-content size="omg">OMG</x-bladewind::centered-content>');

        $view->assertSee('OMG');
    }

    // ── Statistic (radii) ────────────────────────────────────────────────────

    public function test_statistic_renders_radius_none()
    {
        $view = $this->blade('<x-bladewind::statistic label="Total" number="0" radius="none" />');

        $view->assertSee('rounded-none', false);
    }

    public function test_statistic_renders_radius_large()
    {
        $view = $this->blade('<x-bladewind::statistic label="Total" number="0" radius="large" />');

        $view->assertSee('bw-statistic', false);
    }

    // ── Progress Bar (more colors) ───────────────────────────────────────────

    public function test_progress_bar_renders_green()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="50" color="green" />');

        $view->assertSee('green-', false);
    }

    public function test_progress_bar_renders_blue()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="50" color="blue" />');

        $view->assertSee('blue-', false);
    }

    public function test_progress_bar_renders_pink()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="50" color="pink" />');

        $view->assertSee('pink-', false);
    }

    public function test_progress_bar_renders_with_label_outside()
    {
        $view = $this->blade('<x-bladewind::progress-bar percentage="50" show_percentage_label="true" show_percentage_label_inline="false" percentage_label_position="top-right" />');

        $view->assertSee('bw-progress-bar', false);
    }

    // ── Input (more type coverage) ───────────────────────────────────────────

    public function test_input_with_solid_prefix_icon()
    {
        $view = $this->blade('<x-bladewind::input prefix="lock-closed" prefix_is_icon="true" prefix_icon_type="solid" />');

        $view->assertSee('<input', false);
    }

    public function test_input_without_transparent_prefix()
    {
        $view = $this->blade('<x-bladewind::input prefix="$" transparent_prefix="false" />');

        $view->assertSee('$');
    }

    public function test_input_without_transparent_suffix()
    {
        $view = $this->blade('<x-bladewind::input suffix=".com" transparent_suffix="false" />');

        $view->assertSee('.com');
    }

    public function test_input_with_error_heading()
    {
        $view = $this->blade('<x-bladewind::input error_heading="Validation Error" error_message="Field required" />');

        $view->assertSee('Field required');
    }

    // ── Checkbox (more colors) ───────────────────────────────────────────────

    public function test_checkbox_renders_with_red_color()
    {
        $view = $this->blade('<x-bladewind::checkbox color="red" label="Red checkbox" />');

        $view->assertSee('Red checkbox');
    }

    public function test_checkbox_renders_with_green_color()
    {
        $view = $this->blade('<x-bladewind::checkbox color="green" label="Green checkbox" />');

        $view->assertSee('Green checkbox');
    }

    public function test_checkbox_label_css()
    {
        $view = $this->blade('<x-bladewind::checkbox label="Styled label" label_css="font-bold text-red-500" />');

        $view->assertSee('font-bold', false);
    }

    // ── Radio (more colors) ──────────────────────────────────────────────────

    public function test_radio_renders_with_green_color()
    {
        $view = $this->blade('<x-bladewind::radio color="green" label="Green radio" />');

        $view->assertSee('Green radio');
    }

    public function test_radio_renders_with_pink_color()
    {
        $view = $this->blade('<x-bladewind::radio color="pink" label="Pink radio" />');

        $view->assertSee('Pink radio');
    }

    public function test_radio_label_css()
    {
        $view = $this->blade('<x-bladewind::radio label="Styled" label_css="font-semibold" />');

        $view->assertSee('font-semibold', false);
    }

    // ── Toggle (more coverage) ───────────────────────────────────────────────

    public function test_toggle_renders_justified()
    {
        $view = $this->blade('<x-bladewind::toggle label="Notifications" justified="true" />');

        $view->assertSee('justify-between', false);
    }

    public function test_toggle_renders_with_onclick()
    {
        $view = $this->blade('<x-bladewind::toggle onclick="handleToggle()" />');

        $view->assertSee('handleToggle()', false);
    }

    // ── Tag (more coverage) ──────────────────────────────────────────────────

    public function test_tag_does_not_uppercase_when_disabled()
    {
        $view = $this->blade('<x-bladewind::tag label="lowercase tag" uppercasing="false" />');

        $view->assertDontSee('uppercase', false);
    }

    public function test_tag_renders_with_green_color()
    {
        $view = $this->blade('<x-bladewind::tag label="Active" color="green" />');

        $view->assertSee('green-', false);
    }

    public function test_tag_renders_with_orange_color()
    {
        $view = $this->blade('<x-bladewind::tag label="Warning" color="orange" />');

        $view->assertSee('orange-', false);
    }

    // ── Select item attributes ───────────────────────────────────────────────

    public function test_select_item_renders_selected_by_default()
    {
        // data="manual" required for slot-based items to render
        $view = $this->blade('
            <x-bladewind::select name="fruit" data="manual">
                <x-bladewind::select.item value="apple" label="Apple" selected="true" />
                <x-bladewind::select.item value="mango" label="Mango" />
            </x-bladewind::select>
        ');

        $view->assertSee('Apple');
        $view->assertSee('Mango');
    }

    // ── Number (step & icon_type) ────────────────────────────────────────────

    public function test_number_renders_with_step()
    {
        $view = $this->blade('<x-bladewind::number step="5" min="0" max="100" />');

        $view->assertSee('<input', false);
    }

    public function test_number_renders_with_solid_icon_type()
    {
        $view = $this->blade('<x-bladewind::number icon_type="solid" />');

        $view->assertSee('<input', false);
    }

    public function test_number_renders_opaque_icons()
    {
        $view = $this->blade('<x-bladewind::number transparent_icons="false" />');

        $view->assertSee('<input', false);
    }

    // ── Slider (more coverage) ───────────────────────────────────────────────

    public function test_slider_renders_with_selected_value()
    {
        $view = $this->blade('<x-bladewind::slider selected="30" />');

        $view->assertSee('bw-slider', false);
    }

    public function test_slider_renders_range_with_max_selected()
    {
        $view = $this->blade('<x-bladewind::slider range="true" selected="20" max_selected="80" />');

        $view->assertSee('bw-slider', false);
    }

    public function test_slider_renders_with_step()
    {
        $view = $this->blade('<x-bladewind::slider step="5" />');

        $view->assertSee('bw-slider', false);
    }

    // ── Datepicker (more coverage) ───────────────────────────────────────────

    public function test_datepicker_renders_with_min_max_dates()
    {
        $view = $this->blade('<x-bladewind::datepicker min_date="01/01/2025" max_date="31/12/2025" />');

        $view->assertSee('bw-datepicker', false);
    }

    public function test_datepicker_renders_with_dd_mm_yyyy_format()
    {
        $view = $this->blade('<x-bladewind::datepicker format="dd/mm/yyyy" />');

        $view->assertSee('bw-datepicker', false);
    }

    public function test_datepicker_renders_with_monday_week_start()
    {
        $view = $this->blade('<x-bladewind::datepicker week_starts="monday" />');

        $view->assertSee('bw-datepicker', false);
    }

    // ── Timepicker (more coverage) ───────────────────────────────────────────

    public function test_timepicker_renders_with_selected_value()
    {
        $view = $this->blade('<x-bladewind::timepicker selected_value="10:30AM" />');

        $view->assertSee('bw-timepicker', false);
    }

    public function test_timepicker_renders_with_custom_labels()
    {
        $view = $this->blade('<x-bladewind::timepicker hour_label="hh" minute_label="mm" />');

        $view->assertSee('hh');
        $view->assertSee('mm');
    }

    // ── Colorpicker (more coverage) ──────────────────────────────────────────
    // Note: colorpicker uses class bw-color-picker-{name}, not bw-colorpicker

    public function test_colorpicker_renders_with_custom_colors()
    {
        $view = $this->blade('<x-bladewind::colorpicker colors="#ff0000, #00ff00, #0000ff" />');

        $view->assertSee('bw-color-picker-', false);
    }

    public function test_colorpicker_renders_medium_size()
    {
        $view = $this->blade('<x-bladewind::colorpicker name="theme" size="medium" />');

        $view->assertSee('bw-color-picker-theme', false);
    }

    // ── Shimmer (duration) ───────────────────────────────────────────────────

    public function test_shimmer_renders_with_slow_duration()
    {
        $view = $this->blade('<x-bladewind::shimmer duration="3s" />');

        $view->assertSee('bw-shimmer', false);
    }

    public function test_shimmer_renders_circle_with_matching_dimensions()
    {
        // When circle=true and width/height suffix differs, component overrides to size-24.
        // Use equal values to preserve custom sizing.
        $view = $this->blade('<x-bladewind::shimmer circle="true" width="w-16" height="w-16" />');

        $view->assertSee('rounded-full', false);
        $view->assertSee('w-16', false);
    }

    // ── Empty State (more sizes) ─────────────────────────────────────────────

    public function test_empty_state_renders_small_image()
    {
        $view = $this->blade('<x-bladewind::empty-state image_size="small" />');

        $view->assertSee('bw-empty-state', false);
    }

    public function test_empty_state_renders_xl_image()
    {
        $view = $this->blade('<x-bladewind::empty-state image_size="xl" />');

        $view->assertSee('bw-empty-state', false);
    }

    // ── Verification code (timer) ────────────────────────────────────────────

    public function test_verification_code_renders_with_timer()
    {
        $view = $this->blade('<x-bladewind::code timer="30" />');

        $view->assertSee('pin-code', false);
    }

    public function test_verification_code_renders_with_error_message()
    {
        $view = $this->blade('<x-bladewind::code error_message="Invalid code entered" />');

        $view->assertSee('Invalid code entered');
    }

    // ── Filepicker (more coverage) ───────────────────────────────────────────

    public function test_filepicker_renders_with_max_files()
    {
        $view = $this->blade('<x-bladewind::filepicker max_files="5" />');

        $view->assertSee('bw-filepicker', false);
    }

    public function test_filepicker_renders_without_image_preview()
    {
        $view = $this->blade('<x-bladewind::filepicker show_image_preview="false" />');

        $view->assertSee('bw-filepicker', false);
    }

    public function test_filepicker_renders_with_accepted_file_types()
    {
        $view = $this->blade('<x-bladewind::filepicker accepted_file_types=".pdf,.docx" />');

        $view->assertSee('bw-filepicker', false);
    }

    // ── Rating (no-click, onclick) ────────────────────────────────────────────

    public function test_rating_renders_non_clickable()
    {
        $view = $this->blade('<x-bladewind::rating clickable="false" rating="4" />');

        $view->assertSee('bw-rating', false);
    }

    public function test_rating_renders_medium_size()
    {
        $view = $this->blade('<x-bladewind::rating size="medium" />');

        $view->assertSee('bw-rating', false);
    }

    // ── Chart (more types) ───────────────────────────────────────────────────
    // Note: chart renders as <canvas> with dynamic class, no bw-chart class

    public function test_chart_renders_doughnut()
    {
        $view = $this->blade('<x-bladewind::chart type="doughnut" :labels="[\'A\', \'B\']" :data="[40, 60]" />');

        $view->assertSee('<canvas', false);
        $view->assertSee("type: 'doughnut'", false);
    }

    public function test_chart_renders_radar()
    {
        $view = $this->blade('<x-bladewind::chart type="radar" :labels="[\'A\']" :data="[5]" />');

        $view->assertSee('<canvas', false);
        $view->assertSee("type: 'radar'", false);
    }

    public function test_chart_renders_area()
    {
        $view = $this->blade('<x-bladewind::chart type="area" :labels="[\'Jan\']" :data="[10]" />');

        $view->assertSee('<canvas', false);
        // area type maps to line with fill:true in Chart.js
        $view->assertSee('"fill":true', false);
    }

    public function test_chart_renders_without_axis_lines()
    {
        $view = $this->blade('<x-bladewind::chart :labels="[\'A\']" :data="[1]" show_axis_lines="false" />');

        $view->assertSee('<canvas', false);
    }

    public function test_chart_renders_without_axis_labels()
    {
        $view = $this->blade('<x-bladewind::chart :labels="[\'A\']" :data="[1]" show_axis_labels="false" />');

        $view->assertSee('<canvas', false);
    }

    // ── Table (selectable, checkable, sortable) ──────────────────────────────

    public function test_table_renders_selectable()
    {
        $data = json_encode([['id' => 1, 'name' => 'Item 1']]);

        $view = $this->blade("<x-bladewind::table data='{$data}' selectable='true' />");

        $view->assertSee('<table', false);
    }

    public function test_table_renders_with_pagination()
    {
        $data = json_encode([['name' => 'Row 1'], ['name' => 'Row 2']]);

        $view = $this->blade("<x-bladewind::table data='{$data}' paginated='true' page_size='1' />");

        $view->assertSee('<table', false);
    }

    public function test_table_renders_searchable()
    {
        $view = $this->blade('
            <x-bladewind::table searchable="true">
                <x-slot name="header"><th>Name</th></x-slot>
                <tr><td>Test</td></tr>
            </x-bladewind::table>
        ');

        $view->assertSee('<input', false);
    }

    // ── Modal (blur sizes) ───────────────────────────────────────────────────

    public function test_modal_renders_with_no_blur()
    {
        $view = $this->blade('<x-bladewind::modal name="no-blur" blur_size="none">Content</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }

    public function test_modal_renders_with_omg_blur()
    {
        $view = $this->blade('<x-bladewind::modal name="omg-modal" blur_size="omg">Content</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }

    public function test_modal_renders_buttons_centered()
    {
        $view = $this->blade('<x-bladewind::modal name="c-modal" align_buttons="center">Content</x-bladewind::modal>');

        $view->assertSee('justify-center', false);
    }

    public function test_modal_renders_stretched_buttons()
    {
        $view = $this->blade('<x-bladewind::modal name="s-modal" stretch_action_buttons="true">Content</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }
}

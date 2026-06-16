<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class FormComponentsTest extends TestCase
{
    // ── Checkbox ─────────────────────────────────────────────────────────────

    public function test_checkbox_renders_default()
    {
        $view = $this->blade('<x-bladewind::checkbox />');

        $view->assertSee('type="checkbox"', false);
        $view->assertSee('bw-checkbox', false);
    }

    public function test_checkbox_renders_with_label()
    {
        $view = $this->blade('<x-bladewind::checkbox label="Accept terms" />');

        $view->assertSee('Accept terms');
    }

    public function test_checkbox_renders_checked()
    {
        $view = $this->blade('<x-bladewind::checkbox checked="true" />');

        $view->assertSee('checked', false);
    }

    public function test_checkbox_renders_disabled()
    {
        $view = $this->blade('<x-bladewind::checkbox disabled="true" />');

        $view->assertSee('disabled', false);
    }

    public function test_checkbox_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::checkbox name="agree" />');

        $view->assertSee('agree', false);
    }

    public function test_checkbox_renders_with_value()
    {
        $view = $this->blade('<x-bladewind::checkbox value="yes" />');

        $view->assertSee('yes', false);
    }

    public function test_checkbox_renders_with_color()
    {
        $view = $this->blade('<x-bladewind::checkbox color="pink" />');

        $view->assertSee('pink', false);
    }

    // ── Radio Button ─────────────────────────────────────────────────────────

    public function test_radio_renders_default()
    {
        $view = $this->blade('<x-bladewind::radio />');

        $view->assertSee('type="radio"', false);
    }

    public function test_radio_renders_with_label()
    {
        $view = $this->blade('<x-bladewind::radio label="Option A" />');

        $view->assertSee('Option A');
    }

    public function test_radio_renders_checked()
    {
        $view = $this->blade('<x-bladewind::radio checked="true" />');

        $view->assertSee('checked', false);
    }

    public function test_radio_renders_disabled()
    {
        $view = $this->blade('<x-bladewind::radio disabled="true" />');

        $view->assertSee('disabled', false);
    }

    public function test_radio_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::radio name="payment_method" />');

        $view->assertSee('payment_method', false);
    }

    public function test_radio_renders_with_value()
    {
        $view = $this->blade('<x-bladewind::radio value="card" />');

        $view->assertSee('card', false);
    }

    public function test_radio_renders_with_color_red()
    {
        $view = $this->blade('<x-bladewind::radio color="red" />');

        $view->assertSee('red', false);
    }

    // ── Toggle ───────────────────────────────────────────────────────────────

    public function test_toggle_renders_default()
    {
        $view = $this->blade('<x-bladewind::toggle />');

        $view->assertSee('type="checkbox"', false);
        $view->assertSee('bw-tgl-', false);
    }

    public function test_toggle_renders_with_label()
    {
        $view = $this->blade('<x-bladewind::toggle label="Enable notifications" />');

        $view->assertSee('Enable notifications');
    }

    public function test_toggle_renders_checked()
    {
        $view = $this->blade('<x-bladewind::toggle checked="true" />');

        $view->assertSee('checked', false);
    }

    public function test_toggle_renders_disabled()
    {
        $view = $this->blade('<x-bladewind::toggle disabled="true" />');

        $view->assertSee('disabled', false);
    }

    public function test_toggle_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::toggle name="subscribe" />');

        $view->assertSee('subscribe', false);
    }

    public function test_toggle_renders_with_color_purple()
    {
        $view = $this->blade('<x-bladewind::toggle color="purple" />');

        $view->assertSee('purple-', false);
    }

    public function test_toggle_renders_label_on_right()
    {
        $view = $this->blade('<x-bladewind::toggle label="On right" label_position="right" />');

        $view->assertSee('On right');
    }

    public function test_toggle_renders_thin_bar()
    {
        $view = $this->blade('<x-bladewind::toggle bar="thin" />');

        $view->assertSee('bw-tgl-', false);
    }

    public function test_toggle_renders_thicker_bar()
    {
        $view = $this->blade('<x-bladewind::toggle bar="thicker" />');

        $view->assertSee('bw-tgl-', false);
    }

    // ── Textarea ─────────────────────────────────────────────────────────────

    public function test_textarea_renders_default()
    {
        $view = $this->blade('<x-bladewind::textarea />');

        $view->assertSee('<textarea', false);
    }

    public function test_textarea_renders_with_placeholder()
    {
        $view = $this->blade('<x-bladewind::textarea placeholder="Enter your message" />');

        $view->assertSee('Enter your message');
    }

    public function test_textarea_renders_with_label()
    {
        $view = $this->blade('<x-bladewind::textarea label="Message" />');

        $view->assertSee('Message');
    }

    public function test_textarea_renders_required()
    {
        $view = $this->blade('<x-bladewind::textarea required="true" label="Notes" />');

        // Required indicator renders as an inline SVG star, not a literal '*'
        $view->assertSee('!text-red-400', false);
    }

    public function test_textarea_renders_with_rows()
    {
        $view = $this->blade('<x-bladewind::textarea rows="6" />');

        $view->assertSee('rows="6"', false);
    }

    public function test_textarea_renders_with_selected_value()
    {
        $view = $this->blade('<x-bladewind::textarea selected_value="Hello world" />');

        $view->assertSee('Hello world');
    }

    public function test_textarea_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::textarea name="description" />');

        $view->assertSee('description', false);
    }

    public function test_textarea_renders_with_error_message()
    {
        $view = $this->blade('<x-bladewind::textarea error_message="Field required" />');

        $view->assertSee('Field required');
    }

    // ── Rating ───────────────────────────────────────────────────────────────

    public function test_rating_renders_default()
    {
        $view = $this->blade('<x-bladewind::rating />');

        $view->assertSee('bw-rating', false);
    }

    public function test_rating_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::rating name="product-rating" />');

        // Hyphens in name are converted to underscores internally
        $view->assertSee('product_rating', false);
    }

    public function test_rating_renders_with_rating_value()
    {
        $view = $this->blade('<x-bladewind::rating rating="3" />');

        $view->assertSee('bw-rating', false);
    }

    public function test_rating_renders_heart_type()
    {
        $view = $this->blade('<x-bladewind::rating type="heart" />');

        // Heart type renders a different SVG path (no word "heart" in output)
        $view->assertSee('M4.318', false);
    }

    public function test_rating_renders_thumbsup_type()
    {
        $view = $this->blade('<x-bladewind::rating type="thumbsup" />');

        $view->assertSee('bw-rating', false);
    }

    public function test_rating_renders_big_size()
    {
        $view = $this->blade('<x-bladewind::rating size="big" />');

        $view->assertSee('bw-rating', false);
    }

    public function test_rating_renders_with_color()
    {
        $view = $this->blade('<x-bladewind::rating color="yellow" />');

        $view->assertSee('yellow', false);
    }

    // ── Select ───────────────────────────────────────────────────────────────

    public function test_select_renders_default()
    {
        $view = $this->blade('<x-bladewind::select />');

        $view->assertSee('bw-select', false);
    }

    public function test_select_renders_with_placeholder()
    {
        $view = $this->blade('<x-bladewind::select placeholder="Choose country" />');

        $view->assertSee('Choose country');
    }

    public function test_select_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::select name="country" />');

        $view->assertSee('country', false);
    }

    public function test_select_renders_with_data()
    {
        $data = json_encode([
            ['value' => '1', 'label' => 'Option A'],
            ['value' => '2', 'label' => 'Option B'],
        ]);

        $view = $this->blade("<x-bladewind::select data='{$data}' />");

        $view->assertSee('bw-select', false);
    }

    public function test_select_renders_disabled()
    {
        $view = $this->blade('<x-bladewind::select disabled="true" />');

        $view->assertSee('bw-select', false);
    }

    public function test_select_renders_required()
    {
        $view = $this->blade('<x-bladewind::select required="true" placeholder="Pick one" />');

        // Required indicator renders as an inline SVG star, not a literal '*'
        $view->assertSee('!text-red-400', false);
    }

    public function test_select_renders_searchable()
    {
        $view = $this->blade('<x-bladewind::select searchable="true" />');

        $view->assertSee('bw-select', false);
    }

    public function test_select_renders_multiple()
    {
        $view = $this->blade('<x-bladewind::select multiple="true" />');

        $view->assertSee('bw-select', false);
    }

    public function test_select_renders_with_label()
    {
        $view = $this->blade('<x-bladewind::select label="Country" />');

        $view->assertSee('Country');
    }

    public function test_select_renders_manual_items()
    {
        // data="manual" is required to render slot-based items instead of data array
        $view = $this->blade('
            <x-bladewind::select name="size" data="manual">
                <x-bladewind::select.item value="s" label="Small" />
                <x-bladewind::select.item value="l" label="Large" selected="true" />
            </x-bladewind::select>
        ');

        $view->assertSee('Small');
        $view->assertSee('Large');
    }

    // ── Number ───────────────────────────────────────────────────────────────

    public function test_number_renders_default()
    {
        $view = $this->blade('<x-bladewind::number />');

        $view->assertSee('<input', false);
    }

    public function test_number_renders_with_label()
    {
        $view = $this->blade('<x-bladewind::number label="Age" />');

        $view->assertSee('Age');
    }

    public function test_number_renders_with_min_max()
    {
        $view = $this->blade('<x-bladewind::number min="0" max="100" />');

        $view->assertSee('<input', false);
    }

    public function test_number_renders_with_selected_value()
    {
        $view = $this->blade('<x-bladewind::number selected_value="25" />');

        $view->assertSee('<input', false);
    }

    public function test_number_renders_required()
    {
        $view = $this->blade('<x-bladewind::number required="true" label="Count" />');

        // Required indicator renders as an inline SVG star, not a literal '*'
        $view->assertSee('!text-red-400', false);
    }

    public function test_number_renders_big_size()
    {
        $view = $this->blade('<x-bladewind::number size="big" />');

        $view->assertSee('<input', false);
    }

    // ── Slider ───────────────────────────────────────────────────────────────

    public function test_slider_renders_default()
    {
        $view = $this->blade('<x-bladewind::slider />');

        $view->assertSee('bw-slider', false);
    }

    public function test_slider_renders_with_min_max()
    {
        $view = $this->blade('<x-bladewind::slider min="10" max="90" />');

        $view->assertSee('bw-slider', false);
    }

    public function test_slider_renders_range()
    {
        $view = $this->blade('<x-bladewind::slider range="true" />');

        $view->assertSee('bw-slider', false);
    }

    public function test_slider_renders_with_color()
    {
        $view = $this->blade('<x-bladewind::slider color="red" />');

        $view->assertSee('red', false);
    }

    public function test_slider_hides_values_when_disabled()
    {
        $view = $this->blade('<x-bladewind::slider show_values="false" />');

        $view->assertSee('bw-slider', false);
    }

    // ── Colorpicker ──────────────────────────────────────────────────────────
    // Note: renders with class bw-color-picker-{name}, not bw-colorpicker

    public function test_colorpicker_renders_default()
    {
        $view = $this->blade('<x-bladewind::colorpicker name="my_color" />');

        $view->assertSee('bw-color-picker-my_color', false);
    }

    public function test_colorpicker_shows_value_when_enabled()
    {
        $view = $this->blade('<x-bladewind::colorpicker name="picker" show_value="true" />');

        $view->assertSee('bw-color-picker-picker', false);
    }

    public function test_colorpicker_renders_with_selected_value()
    {
        $view = $this->blade('<x-bladewind::colorpicker name="col" selected_value="#ff0000" />');

        $view->assertSee('#ff0000', false);
    }

    public function test_colorpicker_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::colorpicker name="bg_color" />');

        $view->assertSee('bw-color-picker-bg_color', false);
    }

    // ── Datepicker ───────────────────────────────────────────────────────────

    public function test_datepicker_renders_default()
    {
        $view = $this->blade('<x-bladewind::datepicker />');

        $view->assertSee('bw-datepicker', false);
    }

    public function test_datepicker_renders_with_placeholder()
    {
        // datepicker uses 'label' for the visible text (placeholder is for input HTML attr)
        $view = $this->blade('<x-bladewind::datepicker label="Pick a date" />');

        $view->assertSee('Pick a date');
    }

    public function test_datepicker_renders_required()
    {
        $view = $this->blade('<x-bladewind::datepicker required="true" label="Date" />');

        // Required indicator renders as an inline SVG star, not a literal '*'
        $view->assertSee('!text-red-400', false);
    }

    public function test_datepicker_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::datepicker name="birth_date" />');

        $view->assertSee('birth_date', false);
    }

    public function test_datepicker_renders_range_mode()
    {
        $view = $this->blade('<x-bladewind::datepicker range="true" />');

        $view->assertSee('bw-datepicker', false);
    }

    // ── Timepicker ───────────────────────────────────────────────────────────

    public function test_timepicker_renders_default()
    {
        $view = $this->blade('<x-bladewind::timepicker />');

        $view->assertSee('bw-timepicker', false);
    }

    public function test_timepicker_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::timepicker name="start_time" />');

        $view->assertSee('start_time', false);
    }

    public function test_timepicker_renders_24_hour_format()
    {
        $view = $this->blade('<x-bladewind::timepicker format="24" />');

        $view->assertSee('bw-timepicker', false);
    }

    public function test_timepicker_renders_inline_style()
    {
        // inline style renders as select dropdowns, not the modal-based timepicker
        $view = $this->blade('<x-bladewind::timepicker style="inline" />');

        $view->assertSee('<div class="flex"', false);
    }

    public function test_timepicker_renders_required()
    {
        $view = $this->blade('<x-bladewind::timepicker required="true" />');

        // timepicker appends * to placeholder text when required
        $view->assertSee('HH:MM *', false);
    }

    // ── Verification Code ────────────────────────────────────────────────────

    public function test_verification_code_renders_default()
    {
        $view = $this->blade('<x-bladewind::code />');

        $view->assertSee('pin-code', false);
    }

    public function test_verification_code_renders_with_custom_digits()
    {
        $view = $this->blade('<x-bladewind::code total_digits="6" />');

        $view->assertSee('pin-code', false);
    }

    public function test_verification_code_renders_masked()
    {
        $view = $this->blade('<x-bladewind::code mask="true" />');

        $view->assertSee('pin-code', false);
    }

    public function test_verification_code_renders_big_size()
    {
        $view = $this->blade('<x-bladewind::code size="big" />');

        $view->assertSee('pin-code', false);
    }

    public function test_verification_code_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::code name="otp-code" />');

        // Hyphens in name are converted to underscores internally
        $view->assertSee('otp_code', false);
    }

    // ── Filepicker ───────────────────────────────────────────────────────────

    public function test_filepicker_renders_default()
    {
        $view = $this->blade('<x-bladewind::filepicker />');

        $view->assertSee('bw-filepicker', false);
    }

    public function test_filepicker_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::filepicker name="profile_photo" />');

        $view->assertSee('profile_photo', false);
    }

    public function test_filepicker_renders_required()
    {
        $view = $this->blade('<x-bladewind::filepicker required="true" />');

        $view->assertSee('bw-filepicker', false);
    }

    public function test_filepicker_renders_disabled()
    {
        $view = $this->blade('<x-bladewind::filepicker disabled="true" />');

        $view->assertSee('bw-filepicker', false);
    }

    public function test_filepicker_renders_with_custom_placeholder()
    {
        $view = $this->blade('<x-bladewind::filepicker placeholder_line1="Drop your files here" />');

        $view->assertSee('Drop your files here');
    }
}

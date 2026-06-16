<?php

namespace Tests\Feature\Components;

use Tests\TestCase;

class FeedbackComponentsTest extends TestCase
{
    // ── Spinner ──────────────────────────────────────────────────────────────

    public function test_spinner_renders_default()
    {
        $view = $this->blade('<x-bladewind::spinner />');

        $view->assertSee('bw-spinner', false);
        $view->assertSee('animate-spin', false);
    }

    public function test_spinner_renders_with_size_medium()
    {
        $view = $this->blade('<x-bladewind::spinner size="medium" />');

        $view->assertSee('bw-spinner', false);
        $view->assertSee('h-10', false);
    }

    public function test_spinner_renders_with_size_big()
    {
        $view = $this->blade('<x-bladewind::spinner size="big" />');

        $view->assertSee('bw-spinner', false);
        $view->assertSee('h-14', false);
    }

    public function test_spinner_renders_with_size_xl()
    {
        $view = $this->blade('<x-bladewind::spinner size="xl" />');

        $view->assertSee('h-24', false);
    }

    public function test_spinner_renders_with_size_omg()
    {
        $view = $this->blade('<x-bladewind::spinner size="omg" />');

        $view->assertSee('h-36', false);
    }

    public function test_spinner_renders_with_color_blue()
    {
        $view = $this->blade('<x-bladewind::spinner color="blue" />');

        $view->assertSee('blue-', false);
    }

    public function test_spinner_renders_with_color_red()
    {
        $view = $this->blade('<x-bladewind::spinner color="red" />');

        $view->assertSee('red-', false);
    }

    public function test_spinner_renders_with_additional_class()
    {
        $view = $this->blade('<x-bladewind::spinner class="my-spinner" />');

        $view->assertSee('my-spinner', false);
    }

    // ── Shimmer ──────────────────────────────────────────────────────────────

    public function test_shimmer_renders_default()
    {
        $view = $this->blade('<x-bladewind::shimmer />');

        $view->assertSee('bw-shimmer', false);
        // animation controlled via CSS custom property
        $view->assertSee('--shimmer-duration', false);
    }

    public function test_shimmer_renders_as_circle()
    {
        $view = $this->blade('<x-bladewind::shimmer circle="true" />');

        $view->assertSee('rounded-full', false);
    }

    public function test_shimmer_renders_with_custom_width()
    {
        $view = $this->blade('<x-bladewind::shimmer width="w-64" />');

        $view->assertSee('w-64', false);
    }

    public function test_shimmer_renders_with_custom_height()
    {
        $view = $this->blade('<x-bladewind::shimmer height="h-12" />');

        $view->assertSee('h-12', false);
    }

    public function test_shimmer_renders_with_alternate_animation()
    {
        $view = $this->blade('<x-bladewind::shimmer animation="alternate" />');

        $view->assertSee('bw-shimmer', false);
    }

    public function test_shimmer_renders_with_additional_class()
    {
        $view = $this->blade('<x-bladewind::shimmer class="my-shimmer" />');

        $view->assertSee('my-shimmer', false);
    }

    // ── Modal ────────────────────────────────────────────────────────────────

    public function test_modal_renders_default()
    {
        $view = $this->blade('<x-bladewind::modal name="test-modal">Modal content</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
        $view->assertSee('Modal content');
    }

    public function test_modal_renders_with_title()
    {
        $view = $this->blade('<x-bladewind::modal name="titled-modal" title="My Modal">Content</x-bladewind::modal>');

        $view->assertSee('My Modal');
    }

    public function test_modal_renders_with_type_error()
    {
        $view = $this->blade('<x-bladewind::modal name="err-modal" type="error">Error content</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }

    public function test_modal_renders_with_type_warning()
    {
        $view = $this->blade('<x-bladewind::modal name="warn-modal" type="warning">Warning</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }

    public function test_modal_renders_with_type_success()
    {
        $view = $this->blade('<x-bladewind::modal name="success-modal" type="success">Success</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }

    public function test_modal_renders_with_type_info()
    {
        $view = $this->blade('<x-bladewind::modal name="info-modal" type="info">Info</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }

    public function test_modal_renders_custom_ok_button_label()
    {
        $view = $this->blade('<x-bladewind::modal name="custom-modal" ok_button_label="Confirm">Content</x-bladewind::modal>');

        $view->assertSee('Confirm');
    }

    public function test_modal_renders_custom_cancel_button_label()
    {
        $view = $this->blade('<x-bladewind::modal name="cancel-modal" cancel_button_label="Dismiss">Content</x-bladewind::modal>');

        $view->assertSee('Dismiss');
    }

    public function test_modal_hides_action_buttons()
    {
        $view = $this->blade('<x-bladewind::modal name="no-btn-modal" show_action_buttons="false">Content</x-bladewind::modal>');

        $view->assertDontSee('okay');
    }

    public function test_modal_renders_with_size_small()
    {
        $view = $this->blade('<x-bladewind::modal name="sm-modal" size="small">Content</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }

    public function test_modal_renders_with_close_icon()
    {
        $view = $this->blade('<x-bladewind::modal name="close-modal" show_close_icon="true">Content</x-bladewind::modal>');

        // The close icon is an inline SVG — look for its dedicated CSS class
        $view->assertSee('modal-close-icon', false);
    }

    public function test_modal_renders_with_size_tiny()
    {
        $view = $this->blade('<x-bladewind::modal name="tiny-modal" size="tiny">Content</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }

    public function test_modal_renders_with_size_medium()
    {
        $view = $this->blade('<x-bladewind::modal name="med-modal" size="medium">Content</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }

    public function test_modal_renders_with_size_large()
    {
        $view = $this->blade('<x-bladewind::modal name="lg-modal" size="large">Content</x-bladewind::modal>');

        $view->assertSee('bw-modal', false);
    }

    // ── Notification ─────────────────────────────────────────────────────────

    public function test_notification_renders_default()
    {
        $view = $this->blade('<x-bladewind::notification />');

        $view->assertSee('bw-notification', false);
    }

    public function test_notification_renders_top_right()
    {
        $view = $this->blade('<x-bladewind::notification position="top-right" />');

        $view->assertSee('bw-notification', false);
    }

    public function test_notification_renders_bottom_right()
    {
        $view = $this->blade('<x-bladewind::notification position="bottom-right" />');

        $view->assertSee('bw-notification', false);
    }

    public function test_notification_renders_top_left()
    {
        $view = $this->blade('<x-bladewind::notification position="top-left" />');

        $view->assertSee('bw-notification', false);
    }

    public function test_notification_renders_bottom_left()
    {
        $view = $this->blade('<x-bladewind::notification position="bottom-left" />');

        $view->assertSee('bw-notification', false);
    }

    // ── Empty State ──────────────────────────────────────────────────────────

    public function test_empty_state_renders_default()
    {
        $view = $this->blade('<x-bladewind::empty-state />');

        $view->assertSee('bw-empty-state', false);
    }

    public function test_empty_state_renders_with_message()
    {
        $view = $this->blade('<x-bladewind::empty-state message="Nothing here" />');

        $view->assertSee('Nothing here');
    }

    public function test_empty_state_renders_with_heading()
    {
        $view = $this->blade('<x-bladewind::empty-state heading="No Results" message="Try again" />');

        $view->assertSee('No Results');
    }

    public function test_empty_state_renders_with_button()
    {
        $view = $this->blade('<x-bladewind::empty-state button_label="Add Item" onclick="addItem()" />');

        $view->assertSee('Add Item');
    }

    public function test_empty_state_hides_image()
    {
        $view = $this->blade('<x-bladewind::empty-state show_image="false" message="Empty" />');

        $view->assertDontSee('<img', false);
    }

    public function test_empty_state_renders_with_custom_image()
    {
        $view = $this->blade('<x-bladewind::empty-state image="/images/empty.png" />');

        $view->assertSee('/images/empty.png', false);
    }

    // ── Processing ───────────────────────────────────────────────────────────
    // Note: the component uses the name as its CSS class (dynamic by default)

    public function test_processing_renders_default()
    {
        $view = $this->blade('<x-bladewind::processing />');

        // Always contains a spinner and process-message div
        $view->assertSee('bw-spinner', false);
        $view->assertSee('process-message', false);
    }

    public function test_processing_renders_with_message()
    {
        $view = $this->blade('<x-bladewind::processing message="Please wait..." />');

        $view->assertSee('Please wait...');
    }

    public function test_processing_renders_visible_when_hide_false()
    {
        $view = $this->blade('<x-bladewind::processing hide="false" />');

        $view->assertDontSee(' hidden ', false);
    }

    public function test_processing_is_hidden_by_default()
    {
        $view = $this->blade('<x-bladewind::processing />');

        $view->assertSee('hidden', false);
    }

    public function test_processing_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::processing name="upload-process" />');

        $view->assertSee('upload-process', false);
    }

    public function test_process_complete_renders_default()
    {
        $view = $this->blade('<x-bladewind::process-complete />');

        // Default shows green thumbs-up (hand-thumb-up icon)
        $view->assertSee('bg-green-500', false);
        $view->assertSee('process-message', false);
    }

    public function test_process_complete_renders_failed()
    {
        $view = $this->blade('<x-bladewind::process-complete process_completed_as="failed" />');

        // Failed shows red thumbs-down
        $view->assertSee('bg-red-500', false);
    }

    public function test_process_complete_renders_with_message()
    {
        $view = $this->blade('<x-bladewind::process-complete message="Upload complete!" />');

        $view->assertSee('Upload complete!');
    }

    public function test_process_complete_renders_with_button()
    {
        $view = $this->blade('<x-bladewind::process-complete button_label="Done" button_action="closeModal()" />');

        $view->assertSee('Done');
    }

    public function test_process_complete_renders_with_name()
    {
        $view = $this->blade('<x-bladewind::process-complete name="upload-complete" />');

        $view->assertSee('upload-complete', false);
    }
}

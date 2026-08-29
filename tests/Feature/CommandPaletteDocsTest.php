<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class CommandPaletteDocsTest extends TestCase
{
    public function test_command_palette_page_renders_the_complete_public_api(): void
    {
        $response = $this->get('/component/command-palette')
            ->assertOk()
            ->assertSee('Command Palette')
            ->assertSee('Opening the Palette')
            ->assertSee('Searching and Grouped Results')
            ->assertSee('Keyboard Behavior')
            ->assertSee('Full List of Attributes')
            ->assertSee('Slots')
            ->assertSee('JavaScript API')
            ->assertSee('Events')
            ->assertSee('Command Palette with all attributes defined')
            ->assertSee('resources &gt; views &gt; components &gt; bladewind &gt; command-palette', false)
            ->assertDontSee('<h2 id="installation">', false)
            ->assertDontSee('Basic Usage');

        $html = $response->getContent();
        $this->assertStringContainsString('data-bw-command-palette', $html);
        $this->assertStringContainsString('openCommandPalette', $html);
        $this->assertStringContainsString('setCommandPaletteLoading', $html);
    }

    public function test_rendered_examples_use_valid_command_palette_and_composed_component_apis(): void
    {
        $html = $this->get('/component/command-palette')->assertOk()->getContent();
        $document = new DOMDocument;
        @$document->loadHTML($html);
        $xpath = new DOMXPath($document);

        $palettes = $xpath->query('//*[@data-bw-command-palette]');
        $this->assertGreaterThanOrEqual(2, $palettes->length);
        foreach ($palettes as $palette) {
            $this->assertNotSame('', $palette->getAttribute('data-name'));
            $this->assertGreaterThan(0, $xpath->query('.//*[@role="listbox"]', $palette)->length);
        }

        $this->assertGreaterThan(0, $xpath->query('//*[@data-bw-command-palette-group]')->length);
        $this->assertGreaterThan(0, $xpath->query('//*[@data-bw-command-palette-item][@data-item-name="new-order"]//kbd')->length);
    }

    public function test_command_palette_is_linked_from_navigation_catalogue_and_install_tables(): void
    {
        $this->get('/component/button')->assertOk()->assertSee('/component/command-palette', false);
        $this->get('/components')->assertOk()->assertSee('/component/command-palette', false);
        $this->get('/install')->assertOk()
            ->assertSee('mkocansey/bladewind-command-palette')
            ->assertSee('mkocansey/bladewind-navigation');
    }

    public function test_command_palette_and_relevant_sections_are_discoverable_in_search(): void
    {
        $results = collect($this->getJson('/api/docs/search?q=command%20palette')->assertOk()->json('results'));
        $this->assertTrue($results->contains(fn (array $result) => $result['title'] === 'Command Palette' && $result['url'] === '/component/command-palette'));

        $sections = collect($this->getJson('/api/docs/search?q=keyboard%20shortcut')->assertOk()->json('results'));
        $this->assertTrue($sections->contains(fn (array $result) => $result['url'] === '/component/command-palette#opening'));
    }
}

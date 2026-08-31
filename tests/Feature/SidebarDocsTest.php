<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class SidebarDocsTest extends TestCase
{
    public function test_sidebar_page_renders_the_complete_public_api(): void
    {
        $response = $this->get('/component/sidebar')
            ->assertOk()
            ->assertSee('Sidebar')
            ->assertSee('Mobile Drawer Presentation')
            ->assertSee('Nested and Collapsible Navigation')
            ->assertSee('Desktop Expanded and Collapsed States')
            ->assertSee('Full List of Attributes')
            ->assertSee('Slots')
            ->assertSee('JavaScript API')
            ->assertSee('Events')
            ->assertSee('Sidebar with all attributes defined')
            ->assertSee('resources &gt; views &gt; components &gt; bladewind &gt; sidebar', false)
            ->assertDontSee('<h2 id="installation">', false)
            ->assertDontSee('Basic Usage');

        $html = $response->getContent();
        $this->assertStringContainsString('data-bw-drawer', $html);
        $this->assertStringContainsString('openSidebar', $html);
        $this->assertStringContainsString('toggleSidebarGroup', $html);
    }

    public function test_rendered_examples_use_valid_sidebar_and_composed_component_apis(): void
    {
        $html = $this->get('/component/sidebar')->assertOk()->getContent();
        $document = new DOMDocument;
        @$document->loadHTML($html);
        $xpath = new DOMXPath($document);

        $sidebars = $xpath->query('//*[@data-bw-sidebar]');
        $this->assertGreaterThanOrEqual(7, $sidebars->length);
        foreach ($sidebars as $sidebar) {
            $this->assertNotSame('', $sidebar->getAttribute('data-name'));
            $this->assertGreaterThan(0, $xpath->query('.//nav[@aria-label]', $sidebar)->length);
        }

        $this->assertGreaterThan(0, $xpath->query('//*[@data-bw-sidebar]//*[contains(@class, "bw-avatar")]')->length);
        $this->assertGreaterThan(0, $xpath->query('//*[@data-bw-sidebar-item][@data-item-name="roles"]')->length);
        $this->assertGreaterThan(0, $xpath->query('//*[@data-bw-sidebar-group]//*[@data-bw-sidebar-group]//*[@data-bw-sidebar-group]')->length);
    }

    public function test_sidebar_is_linked_from_navigation_catalogue_and_install_tables(): void
    {
        $this->get('/component/button')->assertOk()->assertSee('/component/sidebar', false);
        $this->get('/components')->assertOk()->assertSee('/component/sidebar', false);
        $this->get('/install')->assertOk()
            ->assertSee('bladewindui/sidebar')
            ->assertSee('bladewindui/navigation');
    }

    public function test_sidebar_and_relevant_sections_are_discoverable_in_search(): void
    {
        $results = collect($this->getJson('/api/docs/search?q=sidebar')->assertOk()->json('results'));
        $this->assertTrue($results->contains(fn (array $result) => $result['title'] === 'Sidebar' && $result['url'] === '/component/sidebar'));

        $sections = collect($this->getJson('/api/docs/search?q=mobile%20drawer')->assertOk()->json('results'));
        $this->assertTrue($sections->contains(fn (array $result) => $result['url'] === '/component/sidebar#mobile'));
    }
}

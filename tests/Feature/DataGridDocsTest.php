<?php

namespace Tests\Feature;

use DOMDocument;
use DOMXPath;
use Tests\TestCase;

class DataGridDocsTest extends TestCase
{
    public function test_data_grid_page_renders_the_complete_public_api(): void
    {
        $response = $this->get('/component/data-grid')
            ->assertOk()
            ->assertSee('Data Grid')
            ->assertSee('Columns and Rows')
            ->assertSee('Sorting')
            ->assertSee('Searching')
            ->assertSee('Row Selection')
            ->assertSee('Pagination and Server-Driven State')
            ->assertSee('Full List of Attributes')
            ->assertSee('Slots')
            ->assertSee('JavaScript API')
            ->assertSee('Events')
            ->assertSee('resources &gt; views &gt; components &gt; bladewind &gt; data-grid', false)
            ->assertDontSee('<h2 id="installation">', false)
            ->assertDontSee('Basic Usage');

        $html = $response->getContent();
        $this->assertStringContainsString('data-bw-data-grid', $html);
        $this->assertStringContainsString('sortDataGrid', $html);
        $this->assertStringContainsString('setDataGridLoading', $html);
    }

    public function test_rendered_examples_use_valid_data_grid_and_composed_component_apis(): void
    {
        $html = $this->get('/component/data-grid')->assertOk()->getContent();
        $document = new DOMDocument;
        @$document->loadHTML($html);
        $xpath = new DOMXPath($document);

        $grids = $xpath->query('//*[@data-bw-data-grid]');
        $this->assertGreaterThanOrEqual(3, $grids->length);
        foreach ($grids as $grid) {
            $this->assertNotSame('', $grid->getAttribute('data-name'));
            $this->assertGreaterThan(0, $xpath->query('.//table[@aria-label]', $grid)->length);
        }

        $this->assertGreaterThan(0, $xpath->query('//*[@data-bw-data-grid-sort]')->length);
        $this->assertGreaterThan(0, $xpath->query("//input[@data-bw-data-grid-select and @type='radio']")->length);
        $this->assertGreaterThan(0, $xpath->query('//*[@data-bw-data-grid-pagination]')->length);
    }

    public function test_data_grid_is_linked_from_navigation_catalogue_and_install_tables(): void
    {
        $this->get('/component/button')->assertOk()->assertSee('/component/data-grid', false);
        $this->get('/components')->assertOk()->assertSee('/component/data-grid', false);
        $this->get('/install')->assertOk()
            ->assertSee('mkocansey/bladewind-data-grid')
            ->assertSee('mkocansey/bladewind-table');
    }

    public function test_data_grid_and_relevant_sections_are_discoverable_in_search(): void
    {
        $results = collect($this->getJson('/api/docs/search?q=data%20grid')->assertOk()->json('results'));
        $this->assertTrue($results->contains(fn (array $result) => $result['title'] === 'Data Grid' && $result['url'] === '/component/data-grid'));

        $sections = collect($this->getJson('/api/docs/search?q=server-driven%20pagination')->assertOk()->json('results'));
        $this->assertTrue($sections->contains(fn (array $result) => $result['url'] === '/component/data-grid#pagination'));
    }
}

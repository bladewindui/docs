<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Tests\TestCase;

class DocsSearchTest extends TestCase
{
    public function test_it_returns_ranked_component_results(): void
    {
        $response = $this->getJson('/api/docs/search?q=button');

        $response->assertOk()->assertJsonPath('query', 'button');

        $results = collect($response->json('results'));
        $this->assertSame('Button', $results->first()['title']);
        $this->assertTrue($results->contains(fn (array $result) => $result['url'] === '/component/button'));
    }

    public function test_it_links_matching_sections_to_their_anchor(): void
    {
        $results = collect($this->getJson('/api/docs/search?q=focus%20ring')->assertOk()->json('results'));

        $this->assertTrue($results->contains(
            fn (array $result) => $result['title'] === 'Button'
                && $result['section'] === 'Different Focus Ring Widths'
                && $result['url'] === '/component/button#ring-sizes'
        ));
    }

    public function test_it_requires_at_least_two_search_characters(): void
    {
        $this->getJson('/api/docs/search?q=b')->assertUnprocessable();
    }

    public function test_new_routed_docs_views_are_discovered_automatically(): void
    {
        View::addLocation(base_path('tests/Fixtures/views'));
        Route::view('component/search-fixture', 'docs/search-fixture');

        $results = collect($this->getJson('/api/docs/search?q=quasar')->assertOk()->json('results'));

        $this->assertTrue($results->contains(
            fn (array $result) => $result['title'] === 'Search Fixture'
                && $result['url'] === '/component/search-fixture#quasar-options'
        ));
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class BreadcrumbsDocsTest extends TestCase
{
    public function test_the_breadcrumbs_page_renders_its_public_examples(): void
    {
        $this->get('/component/breadcrumbs')
            ->assertOk()
            ->assertSee('Breadcrumbs')
            ->assertSee('aria-current="page"', false)
            ->assertSee('icon-dir=""', false)
            ->assertDontSee('<h2 id="installation">', false)
            ->assertDontSee('<h2 id="basic-usage">', false)
            ->assertSee('Long And Collapsed Trails');
    }

    public function test_breadcrumbs_is_linked_from_the_sidebar_catalogue_and_install_guide(): void
    {
        $this->get('/component/button')->assertOk()->assertSee('/component/breadcrumbs', false);
        $this->get('/components')->assertOk()->assertSee('/component/breadcrumbs', false);
        $this->get('/install')->assertOk()->assertSee('mkocansey/bladewind-breadcrumbs');
    }

    public function test_breadcrumbs_is_discoverable_in_documentation_search(): void
    {
        $results = collect($this->getJson('/api/docs/search?q=breadcrumbs')->assertOk()->json('results'));

        $this->assertTrue($results->contains(
            fn (array $result) => $result['title'] === 'Breadcrumbs'
                && $result['url'] === '/component/breadcrumbs'
        ));
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class DrawerDocsTest extends TestCase
{
    public function test_drawer_page_is_reachable_and_contains_the_public_api(): void
    {
        $this->get('/component/drawer')
            ->assertOk()
            ->assertSee('Drawer')
            ->assertSee('showDrawer')
            ->assertSee('hideDrawer')
            ->assertSee('toggleDrawer')
            ->assertSee('Full List of Attributes')
            ->assertSee('Slots')
            ->assertSee('JavaScript API')
            ->assertSee('Drawer with all attributes defined')
            ->assertSee('resources &gt; views &gt; components &gt; bladewind &gt; drawer.blade.php', false);
    }

    public function test_drawer_is_discoverable_from_navigation_and_catalogue(): void
    {
        $this->get('/install')->assertOk()->assertSee('/component/drawer', false)->assertSee('bladewindui/drawer');
        $this->get('/components')->assertOk()->assertSee('/component/drawer', false);
    }

    public function test_drawer_is_discoverable_in_search(): void
    {
        $this->getJson('/api/docs/search?q=drawer')
            ->assertOk()
            ->assertJsonFragment(['url' => '/component/drawer']);
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class StepperDocsTest extends TestCase
{
    public function test_the_stepper_page_renders_the_complete_public_api(): void
    {
        $this->get('/component/stepper')
            ->assertOk()
            ->assertSee('Stepper')
            ->assertSee('Horizontal Stepper')
            ->assertSee('Vertical Stepper')
            ->assertSee('Visual Styles')
            ->assertSee('Vertical requests fall back to circles')
            ->assertSee('data-style="chevrons"', false)
            ->assertSee('data-style="bars"', false)
            ->assertSee('data-style="line"', false)
            ->assertSee('Linear Wizard')
            ->assertSee('Non-linear and Clickable Workflow')
            ->assertSee('Indicator-only Usage')
            ->assertSee('Validation Event')
            ->assertSee('Full List of Attributes')
            ->assertSee('Slots')
            ->assertSee('JavaScript API')
            ->assertSee('Stepper with all attributes defined')
            ->assertSee('resources &gt; views &gt; components &gt; bladewind &gt; stepper &gt; index.blade.php', false)
            ->assertDontSee('<h2 id="installation">', false)
            ->assertDontSee('<h2 id="basic-usage">', false);
    }

    public function test_every_rendered_stepper_example_has_content_panels(): void
    {
        $html = $this->get('/component/stepper')->assertOk()->getContent();
        $document = new \DOMDocument;

        libxml_use_internal_errors(true);
        $document->loadHTML($html);
        libxml_clear_errors();

        $xpath = new \DOMXPath($document);
        $steppers = $xpath->query('//nav[contains(concat(" ", normalize-space(@class), " "), " bw-stepper ")]');

        $this->assertGreaterThan(0, $steppers->length);
        foreach ($steppers as $stepper) {
            $panels = $xpath->query('.//*[@data-bw-stepper-panel]', $stepper);
            $this->assertGreaterThan(0, $panels->length, 'Rendered Stepper '.$stepper->getAttribute('data-name').' has no content panel.');
            foreach ($panels as $panel) {
                $this->assertGreaterThan(0, $xpath->query('.//h4', $panel)->length, 'Panel '.$panel->getAttribute('data-bw-stepper-panel').' has no heading.');
                $this->assertStringContainsString('bw-stepper-panel-borderless', $panel->getAttribute('class'), 'Panel '.$panel->getAttribute('data-bw-stepper-panel').' should disable its own border when composed with Card.');
                $this->assertGreaterThan(0, $xpath->query('.//*[contains(concat(" ", normalize-space(@class), " "), " bw-card ")]', $panel)->length, 'Panel '.$panel->getAttribute('data-bw-stepper-panel').' does not use Bladewind Card.');
                $this->assertGreaterThanOrEqual(60, mb_strlen(trim($panel->textContent)), 'Panel '.$panel->getAttribute('data-bw-stepper-panel').' needs more explanatory content.');
            }
        }
    }

    public function test_stepper_is_linked_from_navigation_catalogue_and_install_tables(): void
    {
        $this->get('/component/button')->assertOk()->assertSee('/component/stepper', false);
        $this->get('/components')->assertOk()->assertSee('/component/stepper', false);
        $this->get('/install')->assertOk()
            ->assertSee('mkocansey/bladewind-stepper')
            ->assertSee('mkocansey/bladewind-navigation');
    }

    public function test_stepper_and_its_sections_are_discoverable_in_search(): void
    {
        $results = collect($this->getJson('/api/docs/search?q=stepper')->assertOk()->json('results'));
        $this->assertTrue($results->contains(fn (array $result) => $result['title'] === 'Stepper' && $result['url'] === '/component/stepper'));

        $sections = collect($this->getJson('/api/docs/search?q=validation%20event')->assertOk()->json('results'));
        $this->assertTrue($sections->contains(fn (array $result) => $result['url'] === '/component/stepper#validation'));
    }
}

<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EventTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testOverview()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/event')
                    ->assertSee('Event toevoegen');
        });
    }
}

<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ErrorTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testError()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/bestaatniet')
                    ->clickLink("Akkoord")
                    ->assertSee('404');
        });
    }
}

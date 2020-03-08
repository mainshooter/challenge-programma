<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReviewTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @test
     */
    public function ReviewPageTest()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/reviews')
                ->assertSee('Wat bedrijven denken over het Challenge programma');
        });
    }
}
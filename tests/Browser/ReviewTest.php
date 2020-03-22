<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

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

    public function CreateReviewTest() {
      $this->browse(function(Browser $browser) {
        $browser->loginAs(User::where('email', 'avans@gmail.com')->first());
      });
    }
}

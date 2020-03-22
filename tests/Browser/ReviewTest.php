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
        $browser->visit('/reviews');
        $browser->press('Review toevoegen');
        $browser->type('review_stars', 8);
        $browser->value('.ql-editor', 'Het evenement dat is georganiseerd was echt leuk! We hebben ook nieuwe dingen geleerd van de studenten');
        $browser->press('Toevoegen');
        $browser->assertSee('Het evenement dat is georganiseerd was echt leuk! We hebben ook nieuwe dingen geleerd van de studenten');
      });
    }
}

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

    /** @test */
    public function CreateReviewTest() {
      $this->browse(function(Browser $browser) {
        $browser->loginAs(User::where('email', 'avans@gmail.com')->first());
        $browser->visit('/reviews')
                ->clickLink('Akkoord');
        $browser->clickLink('Review toevoegen');
        $browser->type('review_stars', 8);
        $browser->type('.ql-editor', 'Het evenement dat is georganiseerd was echt leuk! We hebben ook nieuwe dingen geleerd van de studenten');
        $browser->press('Toevoegen');
        $browser->assertSee('Het evenement dat is georganiseerd was echt leuk! We hebben ook nieuwe dingen geleerd van de studenten');
      });
    }

    /** @test */
    public function CreateReviewMaxCharTest() {
        $this->browse(function(Browser $browser) {
            $browser->loginAs(User::where('email', 'avans@gmail.com')->first());
            $browser->visit('/reviews');
            $browser->press('Review toevoegen');
            $browser->type('review_stars', 8);
            $browser->type('.ql-editor', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.');
            $browser->press('Toevoegen');
            $browser->assertSee('page content mag niet meer dan 140 karakters bevatten.');
        });
    }

    /** @test */
    public function DeleteReviewTest() {
        $this->browse(function(Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
            $browser->visit('/admin/review');
            $browser->clickLink('Verwijderen');
            $browser->assertDontSee("Deze review moet worden verwijderd.");
        });
    }
}

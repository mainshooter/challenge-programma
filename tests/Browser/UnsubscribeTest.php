<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\User;

class UnsubscribeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
          $browser->loginAs(User::where('email', 'uitschrijven@gmail.com')->first());
          $browser->visit('/student/profile');
          $browser->click('Uitschrijven');
          $browser->click('Uitschrijven');
          $browser->assertSee('Je bent uitgeschreven');
        });
    }
}

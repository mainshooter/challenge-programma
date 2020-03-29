<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\User;

class UnsubscribeTest extends DuskTestCase
{

    /** @test */
    public function testUnsubscribe()
    {
        $this->browse(function (Browser $browser) {
          $browser->loginAs(User::where('email', 'uitschrijven@gmail.com')->first());
          $browser->visit('/student/profile');
          $browser->Clicklink('Uitschrijven');
          $browser->click("input[type=submit]");
          $browser->assertSee('Je bent uitgeschreven');
        });
    }
}

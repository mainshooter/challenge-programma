<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ReserveringTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testEventManagementPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/event')
                    ->assertSee('Goedgekeurde evenementen');
        });
    }

    public function testEventDetailsPage()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/event')
                    ->Clicklink('Details')
                    ->assertSee('Evenement details');
        });
    }

    public function testAcceptEvent(){
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/event')
                    ->clickLink('Akkoord')
                    ->click('.open-events .event-details')
                    ->Clicklink('Evenement accepteren')
                    ->assertSee('Goedgekeurde evenementen');
        });
    }
}

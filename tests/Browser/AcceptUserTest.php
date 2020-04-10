<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AcceptUserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAcceptUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/user/accept-users')
                    ->clickLink('Akkoord')
                    ->clickLink('Accepteren Gebruikers')
                    ->clickLink('Accepteren')
                    ->assertSee('Gebruikers accepteren of weigeren');
        });
    }
}

<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class UserTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testOverview()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
            $browser->visit('/admin/user')
                    ->assertSee('Voornaam');
        });
    }

    public function testCreateUserAsAdmin()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->first())
                    ->visit('/admin/user')
                    ->clickLink('Gebruiker aanmaken')
                    ->clickLink('Akkoord')
                    ->value("input[name=firstname]", "Rico")
                    ->value("input[name=lastname]", "Bender")
                    ->value("input[name=phone]", "0612345678")
                    ->value("input[name=email]", "Henkie@hotmail.com")
                    ->value("input[name=password]", "LeukWachtwoordIsDit!")
                    ->value("input[name=password_confirmation]", "LeukWachtwoordIsDit!")
                    ->press(".content-container input[type=submit]")
                    ->assertSee("Gebruiker aanmaken");
        });
    }

    //delete user test
    public function testDeleteUser(){
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->first())
                ->visit('/admin/user')
                ->click('#delete-3')
                ->clickLink('Verwijderen')
                ->assertSee("Gebruiker is verwijderd");
        });
    }

    /** @test */
    public function testDetails() {
      $this->browse(function(Browser $browser) {
        $browser->loginAs(User::where('email', 'admin@gmail.com')->first())
                ->visit('/admin/user')
                ->clickLink('Details')
                ->assertSee('details');
      });
    }
}

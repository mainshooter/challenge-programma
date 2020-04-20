<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PhotobookTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testVisit()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/photoalbum')
                    ->assertSee('Tijdlijn');
        });
    }

    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'content@gmail.com')->First())
                ->visit('/photoalbum')
                ->clickLink("Akkoord")
                ->clickLink('Nieuwe album toevoegen')
                ->value("input[name=title]", "TestFotoalbum")
                ->value("textarea[name=description]", "TestDescription")
                ->click("input[type=submit]")
                ->assertSee('Fotoalbum is aangemaakt');
        } );

    }
}

<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\User;

class LinkedinTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test()
    {
        $this->browse(function (Browser $browser) {
          $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
          $browser->visit('/photoalbum')
              ->clickLink('Akkoord')
              ->clickLink("Fotoalbum toevoegen")
              ->value("input[name=title]","Test fotoalbum")
              ->value("textarea[name=description]","Admin test fotoalbum")
              ->click("input[type=submit]")
              ->attach('image', public_path('storage/testImage.png'))
              ->click(".content-container input[name=submitPhoto]")
              ->assertSee('Album publiceren naar Linkedin');
        });
    }
}

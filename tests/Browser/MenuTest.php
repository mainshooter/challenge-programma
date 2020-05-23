<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\User;

class MenuTest extends DuskTestCase
{
    // php artisan dusk tests/Browser/MenuTest.php

    // #401
    public function testMenuItemOverview()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/menu?menu=1')
                ->clickLink('Akkoord')
                ->assertSee('Menu bewerken');
        });
    }

    // #402
    public function testAddMenuItem()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/menu?menu=1')
                ->value("input[name=url]", "facebook")
                ->value("input[name=label]", "facebook")
                ->clickLink('Menu item toevoegen')
                ->script('location.reload();');
            $browser ->assertSee('facebook');
        });
    }

    // #403
    public function testDeleteMenuItem(){
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/menu?menu=1')
                ->clickLink(' Fotoalbum |4| ')
                ->clickLink('Verwijderen')
                ->acceptDialog()
                ->assertPresent('#menutitletemp_4');
        });
    }

    // #404
    public function testNavigateToMenuManagement(){
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/management')
                ->clickLink('Menu')
                ->assertSee('Menu bewerken');
        });
    }

    // #405
    public function testViewMenuItemInLayout(){
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/menu?menu=1')
                ->value("input[name=url]", "challengeprogramma")
                ->value("input[name=label]", "challengeprogramma")
                ->clickLink('Menu item toevoegen')
                ->script('location.reload();');
            $browser->assertSee('challengeprogramma');
        });
    }
}

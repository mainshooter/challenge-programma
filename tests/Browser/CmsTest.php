<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class CmsTest extends DuskTestCase
{
    /** @test */
    public function testCreate()
    {
      $this->browse(function (Browser $browser) {
        $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
        $browser->visit('/cms')
                ->clickLink('Akkoord');
        $browser->clickLink("Pagina toevoegen");
        $browser->value("input[name=page_title]", "Test pagina");
        $browser->value("input[name=url_slug]", "test-pagina");
        $browser->value('.ql-editor', 'Leuke test content');
        $browser->click(".content-container input[type=submit]");
        $browser->assertSee("Pagina toevoegen");
      });
    }

    /** @test */
    public function testFailedCreate() {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
            $browser->visit('/cms');
            $browser->clickLink("Pagina toevoegen");
            $browser->value("input[name=page_title]", "Test pagina");
            $browser->value('.ql-editor', 'Leuke test content');
            $browser->click(".content-container input[type=submit]");
            $browser->assertSee("Title");
        });
    }
    /** @test */
    public function testEdit() {
      $this->browse(function(Browser $browser) {
        $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
        $browser->visit('/cms');
        $browser->clickLink("Bewerk");
        $sCurrentTitle = $browser->value('input[name=page_title]');
        $sNewTitle = $sCurrentTitle . "2";
        $browser->value('input[name=page_title]', $sNewTitle);
        $browser->click(".content-container input[type=submit]");
        $browser->assertSee($sNewTitle);
      });
    }

    /** @test */
    public function testVisit() {
      $this->browse(function(Browser $browser) {
        $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
        $browser->visit('/cms');
        $browser->clickLink("Bekijk");
        $browser->assertSee("Test pagina2");
      });
    }

    /** @test */
    public function testDelete() {
      $this->browse(function(Browser $browser) {
        $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
        $browser->visit("/cms");
        $browser->clickLink("Verwijder");
        $browser->assertSee("Pagina toevoegen");
      });
    }
}

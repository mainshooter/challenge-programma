<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CmsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreate()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cms');
            $browser->clickLink("Pagina toevoegen");
            $browser->value("input[name=page_title]", "Test pagina");
            $browser->value("input[name=url_slug]", "test-pagina");
            $browser->value('.ql-editor', 'Leuke test content');
            $browser->click("input[type=submit]");
            $browser->assertSee("Pagina toevoegen");
        });
    }

    public function testEdit() {
      $this->browse(function(Browser $browser) {
        $browser->visit('/cms');
        $browser->click("a.btn.btn-secondary");
        $sCurrentTitle = $browser->value('input[name=page_title]');
        $sNewTitle = $sCurrentTitle . "2";
        $browser->value('input[name=page_title]', $sNewTitle);
        $browser->click("input[type=submit]");
        $browser->assertSee($sNewTitle);
      });
    }

    public function testView() {
      $this->browse(function(Browser $browser) {
        $browser->visit('/cms');
        $browser->click("a.btn.btn-link");
        $browser->assertSee("Test pagina2");
      });
    }

    public function testDelete() {
      $this->browse(function(Browser $browser) {
        $browser->visit("/cms");
        $browser->click("a.btn.btn-danger");
        $browser->assertSee("Pagina toevoegen");
      });
    }
}

<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class StudentAcceptTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAccept() {
        $this->browse(function(Browser $browser) {
            $browser->visit('admin/newStudent')
/*                    ->click("a.btn.btn-success")*/
                    ->assertPathIs("/admin/newStudent");
        });
    }
}

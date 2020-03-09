<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class StudentAcceptTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testAccept() {
        $this->browse(function(Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->first())
                    ->visit('admin/newStudent')
                    ->click("a[id=accept]")
                    ->assertPathIs("/admin/newStudent/accept/1");
        });
    }

    public function testDecline() {
        $this->browse(function(Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->first())
                ->visit('admin/newStudent')
                ->click("a[id=delete]")
                ->assertPathIs("/admin/newStudent/delete/1");
        });
    }
}

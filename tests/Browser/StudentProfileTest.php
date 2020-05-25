<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use \App\User;

class StudentProfileTest extends DuskTestCase
{

    /** @test */
    public function testFilterEvents()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'student@gmail.com')->first());
            $browser->visit('/student/profile')
                ->clickLink('Akkoord');
            $browser->select('selectSort', 'futureevents')
            ->assertSee('Sorteer op toekomstige evenementen');
        });
    }
}

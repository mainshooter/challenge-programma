<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $users = User::all();
        foreach($users as $user) {
            $this->browse(function ($browser) use ($user) {
                echo $user->license_id;
                $browser->loginAs($user)
                    ->visit('/home')
                    ->assertSee('Wat mensen over ons zeggen');
            });
        }
    }
}

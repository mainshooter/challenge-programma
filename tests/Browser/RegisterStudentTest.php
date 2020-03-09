<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class RegisterStudentTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testRegister(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/student');
            $browser->assertSee('Registreren Student');
            $browser->type("firstname", "Henk");
            $browser->type("prefix", "Anton");
            $browser->type("lastname", "Gelens");
            $browser->type("phone", "+31 6 12345678");
            $browser->type("schoolyear", "2");
            $browser->type("email", "Henkie@hotmail.com");
            $browser->type("password", "12345678");
            $browser->type("password-confirm", "12345678");
            $browser->pause(2000);
            $browser->click("input[type=submit]");
        });
        // $this->browse(function (Browser $browser) {
        //     $browser->visit('/register/student');
        //     $browser->value("input[name=firstname]", "Henk");
        //     $browser->value("input[name=prefix]", "Anton");
        //     $browser->value("input[name=lastname]", "Gelens");
        //     $browser->value("input[name=phone]", "+31 6 12345678");
        //     $browser->value("input[name=schoolyear]", "2");
        //     $browser->value("input[name=email]", "Henkie@hotmail.com");
        //     $browser->value("input[name=password]", "12345678");
        //     $browser->value("input[name=password-confirm]", "12345678");
        //     $browser->click("input[type=submit]");
        // });
    }
}

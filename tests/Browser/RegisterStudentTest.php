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
          $browser->value("#firstname", "Henk");
          $browser->value("#lastname", "Gelens");
          $browser->value("#phone", "+31 6 12345678");
          $browser->value("#schoolyear", "2");
          $browser->value("#email", "Henkie@hotmail.com");
          $browser->value("#password", "12345678");
          $browser->value("#password-confirm", "12345678");
          $browser->click("input[type=submit]");
          $browser->assertSee('Wat mensen over ons zeggen');
      });
    }
}

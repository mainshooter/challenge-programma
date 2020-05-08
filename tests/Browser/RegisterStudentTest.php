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
          $browser->visit('/register/student')
                  ->clickLink('Akkoord');
          $browser->value("input[name=firstname]", "Henk");
          $browser->value("input[name=lastname]", "Gelens");
          $browser->value("input[name=phone]", "0612345678");
          $browser->value("input[name=schoolyear]", "2");
          $browser->value("input[name=email]", "Henkie@hotmail.com");
          $browser->value("input[name=password]", "LeukWachtwoordIsDit!");
          $browser->value("input[name=password_confirmation]", "LeukWachtwoordIsDit!");
          $browser->click("input[type=submit]");
          $browser->assertSee('Wat mensen over ons zeggen:');
      });
    }

    public function testRegisterFail(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/student');
            $browser->value("input[name=firstname]", "Henk");
            $browser->value("input[name=lastname]", "Gelens");
            $browser->value("input[name=phone]", "0612345678");
            $browser->value("input[name=schoolyear]", "2");
            $browser->value("input[name=email]", "Henkie@hotmail.com");
            $browser->value("input[name=password]", "LeukWachtwoordIsDit!");
            $browser->value("input[name=password_confirmation]", "LeukWachtwoordIsDit!");
            $browser->click("input[type=submit]");
            $browser->assertSee('email is al bezet');
        });
    }

    public function testRegisterCompany(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/company');
            $browser->value("input[name=firstname]", "Henk");
            $browser->value("input[name=lastname]", "Gelens");
            $browser->value("input[name=company_name]", "PietPaul");
            $browser->value("input[name=street]", "Straat");
            $browser->value("input[name=house_number]", "2");
            $browser->value("input[name=city]", "Stad");
            $browser->value("input[name=zipcode]", "6537PN");
            $browser->value("input[name=phone]", "0612345678");
            $browser->value("input[name=email]", "bedrijf@company.com");
            $browser->value("input[name=password]", "LeukWachtwoordIsDit!");
            $browser->value("input[name=password_confirmation]", "LeukWachtwoordIsDit!");
            $browser->click("input[type=submit]");
            $browser->assertSee('Wat mensen over ons zeggen:');
        });
    }

    public function testRegisterCompanyFail(){
        $this->browse(function (Browser $browser) {
            $browser->visit('/register/company');
            $browser->value("input[name=firstname]", "Henk");
            $browser->value("input[name=lastname]", "Gelens");
            $browser->value("input[name=company_name]", "PietPaul");
            $browser->value("input[name=street]", "Straat");
            $browser->value("input[name=house_number]", "2");
            $browser->value("input[name=city]", "Stad");
            $browser->value("input[name=zipcode]", "6537PN");
            $browser->value("input[name=phone]", "0612345678");
            $browser->value("input[name=email]", "bedrijf@company.com");
            $browser->value("input[name=password]", "LeukWachtwoordIsDit!");
            $browser->value("input[name=password_confirmation]", "LeukWachtwoordIsDit!");
            $browser->click("input[type=submit]");
            $browser->assertSee('email is al bezet');
        });
    }
}

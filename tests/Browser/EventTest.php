<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;

class EventTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testOverview()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
            $browser->visit('/admin/event')
                    ->assertSee('Event toevoegen');
        });
    }

    public function testErrorCreate() {
      $this->browse(function(Browser $browser) {
        $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
        $browser->visit('/admin/event');
        $browser->clickLink('Akkoord');
        $browser->clickLink('Event toevoegen');
        $browser->type('event_name', 'Mijn geweldige event');
        $browser->type('event_description', 'Lorem ipsum da set a mon');
        $browser->type('event_points', 3);
        $browser->type('event_max_students', 1);
        $browser->type('event_straat', 'Onderwijs boulevard');
        $browser->type('event_city', 'Den Bosch');
        $browser->type('event_house_number', '214');
        $browser->type('event_zipcode', '4585');

        $browser->click('input[name="event_start_date_time"]');
        $browser->waitFor('.xdsoft_date[data-date="12"]');
        $browser->click('.xdsoft_date[data-date="12"]');
        $browser->click("input[name=event_house_number]");

        $browser->click('input[name="event_end_date_time"]');
        $browser->waitFor('.xdsoft_datetimepicker:last-child .xdsoft_date[data-date="13"]');
        $browser->click('.xdsoft_datetimepicker:last-child .xdsoft_date[data-date="13"]');
        $browser->click("input[name=event_house_number]");

        $browser->click("input[type=submit]");
        $browser->assertSee('Het evenement postcode formaat is ongeldig.');
      });
    }

    public function testCreate() {
      $this->browse(function(Browser $browser) {
        $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
        $browser->visit('/admin/event');
        $browser->clickLink('Event toevoegen');
        $browser->type('event_name', 'Mijn geweldige event');
        $browser->type('event_description', 'Lorem ipsum da set a mon');
        $browser->type('event_points', 3);
        $browser->type('event_max_students', 1);
        $browser->type('event_straat', 'Onderwijs boulevard');
        $browser->type('event_city', 'Den Bosch');
        $browser->type('event_house_number', '214');
        $browser->type('event_zipcode', '4585XS');

        $browser->click('input[name="event_start_date_time"]');
        $browser->waitFor('.xdsoft_date[data-date="12"]');
        $browser->click('.xdsoft_date[data-date="12"]');
        $browser->click("input[name=event_house_number]");

        $browser->click('input[name="event_end_date_time"]');
        $browser->waitFor('.xdsoft_datetimepicker:last-child .xdsoft_date[data-date="13"]');
        $browser->click('.xdsoft_datetimepicker:last-child .xdsoft_date[data-date="13"]');
        $browser->click("input[name=event_house_number]");

        $browser->click("input[type=submit]");
        $browser->assertSee('Event toevoegen');
      });
    }

    /** @test */
    public function testStudentPresent() {
      $this->browse(function(Browser $browser) {
        $browser->loginAs(User::where('email', 'admin@gmail.com')->first());
        $browser->visit('/admin/event/');
        $browser->press('Aanwezigheid');
        $browser->check('present_user[]');
        $browser->press('Opslaan');
        $browser->assertChecked('present_user[]');
      });
    }
}

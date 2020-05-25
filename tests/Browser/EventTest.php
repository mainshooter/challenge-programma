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

        $browser->click(".content-container input[type=submit]");
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

        $browser->click(".content-container input[type=submit]");
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

    public function testWebsockets() {
      $this->browse(function($createEventBrowser, $websocketTestBrowser) {
        $websocketTestBrowser->visit('/agenda');

        $createEventBrowser->loginAs(User::where('email', 'admin@gmail.com')->first());
        $createEventBrowser->visit('/admin/event');
        $createEventBrowser->clickLink('Event toevoegen');
        $createEventBrowser->type('event_name', 'websocket event');
        $createEventBrowser->type('event_description', 'Lorem ipsum da set a mon');
        $createEventBrowser->type('event_points', 3);
        $createEventBrowser->type('event_max_students', 1);
        $createEventBrowser->type('event_straat', 'Onderwijs boulevard');
        $createEventBrowser->type('event_city', 'Den Bosch');
        $createEventBrowser->type('event_house_number', '214');
        $createEventBrowser->type('event_zipcode', '4585XS');

        $createEventBrowser->click('input[name="event_start_date_time"]');
        $createEventBrowser->waitFor('.xdsoft_date[data-date="12"]');
        $createEventBrowser->click('.xdsoft_date[data-date="12"]');
        $createEventBrowser->click("input[name=event_house_number]");

        $createEventBrowser->click('input[name="event_end_date_time"]');
        $createEventBrowser->waitFor('.xdsoft_datetimepicker:last-child .xdsoft_date[data-date="13"]');
        $createEventBrowser->click('.xdsoft_datetimepicker:last-child .xdsoft_date[data-date="13"]');
        $createEventBrowser->click("input[name=event_house_number]");

        $createEventBrowser->click(".content-container input[type=submit]");
        $createEventBrowser->assertSee('Event toevoegen');

        $websocketTestBrowser->waitForText('websocket event');
        $websocketTestBrowser->assertSee('websocket event');
      });
    }
}

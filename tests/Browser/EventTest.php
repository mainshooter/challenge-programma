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
        $browser->waitFor('.xdsoft_datetimepicker:nth-of-type(2)');
        $browser->click(".xdsoft_datetimepicker:nth-of-type(2) .xdsoft_today");
        $browser->click("input[name=event_house_number]");

        $browser->click('input[name="event_end_date_time"]');
        $browser->waitFor('.xdsoft_datetimepicker:nth-of-type(3)');
        $browser->click(".xdsoft_datetimepicker:nth-of-type(3) .xdsoft_today");
        $browser->click("input[name=event_house_number]");

        $browser->click("input[type=submit]");
        $browser->assertSee('Event toevoegen');
      });
    }
}

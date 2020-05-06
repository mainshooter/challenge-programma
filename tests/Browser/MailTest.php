<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class MailTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testSendMail()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/mail/create')
                ->clickLink("Akkoord");
            $browser->value("input[name=mail_subject]", "Test");
            $browser->value("input[name=page_content]", "Dit is voor een dusk test");
            $browser->click("input[type=submit]");
            $browser->assertSee("De mails zijn verstuurd");
        });
    }

    public function testSendMailAdmin()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/mail/create');
            try {
                $browser->clickLink("Akkoord");
            } catch (\Exception $e) {
            }
            $browser->select('mail_user_role', 'admin');
            $browser->value("input[name=mail_subject]", "Test");
            $browser->value("input[name=page_content]", "Dit is voor een dusk test");
            $browser->click("input[type=submit]");
            $browser->assertSee("De mails zijn verstuurd");
        });
    }

    public function testSendMailCompany()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/mail/create');
            try {
                $browser->clickLink("Akkoord");
            } catch (\Exception $e) {
            }
            $browser->select('mail_user_role', 'company');
            $browser->value("input[name=mail_subject]", "Test");
            $browser->value("input[name=page_content]", "Dit is voor een dusk test");
            $browser->click("input[type=submit]");
            $browser->assertSee("De mails zijn verstuurd");
        });
    }

    public function testSendMailStudent()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'admin@gmail.com')->First());
            $browser->visit('/admin/mail/create');
            try {
                $browser->clickLink("Akkoord");
            } catch (\Exception $e) {
            }
            $browser->select('mail_user_role', 'student');
            $browser->value("input[name=mail_subject]", "Test");
            $browser->value("input[name=page_content]", "Dit is voor een dusk test");
            $browser->click("input[type=submit]");
            $browser->assertSee("De mails zijn verstuurd");
        });
    }
}

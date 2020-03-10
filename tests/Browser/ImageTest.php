<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ImageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testImageUpload() {
        $this->browse(function (Browser $browser) {
            $browser->attach('image', storage_path('app/public/storagetest-file.jpg'))
                ->assertSee('test-file.jng')
                ->assertSeeLink('Opslaan')
                ->clickLink('Opslaan')
                ->assertDontSee('test-file.jpg');
        });
    }

}

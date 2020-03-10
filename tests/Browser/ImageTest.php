<?php

namespace Tests\Browser;

use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
            $browser->visit('/image')
                ->assertSee('Opslaan');
        });
    }

}

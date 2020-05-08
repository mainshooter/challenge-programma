<?php

namespace App\Http\Controllers;

use App\Review;
use App\Image;

class HomepageController extends Controller
{
    public function index(){
        $aImages = Image::all();

        if (count($aImages) > 3) {
          $aImages = $aImages->random(4);
        }


        $aReviews = Review::all();

        if(count($aReviews) > 3){
            $aReviews = $aReviews->random(4);
        }

        return view('homepage.homepage', [
          'aImages' => $aImages,
          'aReviews' => $aReviews,
        ]);
    }
}

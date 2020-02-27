<?php

namespace App\Http\Controllers;

use App\Review;

class HomepageController extends Controller
{
    public function index(){
        $imImage = asset('images/visitekaart.jpg');

        $aImages = array();
        array_push($aImages, $imImage);
        array_push($aImages, $imImage);
        array_push($aImages, $imImage);
        array_push($aImages, $imImage);

        $aReviews = Review::all()->random(4);

        return view('homepage.homepage', ['images' => $aImages, 'reviews' => $aReviews]);
    }
}

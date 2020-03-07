<?php

namespace App\Http\Controllers;

use App\Review;
use App\Image;

class HomepageController extends Controller
{
    public function index(){
        $imImage = asset('images/visitekaart.jpg');
        $image1 = asset('public/storage/1583522646.jpg');
        $image2 = asset('public/storage/1583522697.png');
        $image3 = asset('storage/app/public/1583530911.jpg');

        $fetches = Image::all()->random(4);


        $aImages = array();
        array_push($aImages, $imImage);
        array_push($aImages, $image1);
        array_push($aImages, $image2);
        array_push($aImages, $image3);


        $aReviews = Review::all()->random(4);

        return view('homepage.homepage', ['images' => $fetches, 'reviews' => $aReviews]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Review;

class HomepageController extends Controller
{
    public function index(){
        $image = asset('images/visitekaart.jpg');

        $images = array();
        array_push($images, $image);
        array_push($images, $image);
        array_push($images, $image);
        array_push($images, $image);

        $review = Review::all()->random(4);

        return view('homepage.homepage', ['images' => $images, 'reviews' => $review]);
    }
}

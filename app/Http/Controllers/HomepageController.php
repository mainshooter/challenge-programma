<?php

namespace App\Http\Controllers;

use App\Review;

class HomepageController extends Controller
{
    public function index(){
        $firstimage = asset('images/visitekaart.jpg');
        $secondimage = asset('images/visitekaart.jpg');
        $thirdimage = asset('images/visitekaart.jpg');
        $fourthimage = asset('images/visitekaart.jpg');

        $review = Review::all()->random(1);

        return view('homepage.homepage', ['firstimg' => $firstimage, 'secondimg' => $secondimage, 'thirdimg' => $thirdimage, 'fourthimg' => $fourthimage, 'reviews' => $review]);
    }
}

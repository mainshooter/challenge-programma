<?php

namespace App\Http\Controllers;

class HomepageController extends Controller
{
    public function index(){
        $firstimage = asset('images/visitekaart.jpg');
        $secondimage = asset('images/visitekaart.jpg');
        $thirdimage = asset('images/visitekaart.jpg');
        $fourthimage = asset('images/visitekaart.jpg');

        return view('homepage', ['firstimg' => $firstimage, 'secondimg' => $secondimage, 'thirdimg' => $thirdimage, 'fourthimg' => $fourthimage]);
    }
}

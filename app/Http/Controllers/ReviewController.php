<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){

       // $aReviews = Review::all();

        return view('review/index');
    }

}

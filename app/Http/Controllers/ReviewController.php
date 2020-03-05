<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){

        $nRating = 8;
        return view('review/index', ['avgRating' => $nRating]);
    }

}

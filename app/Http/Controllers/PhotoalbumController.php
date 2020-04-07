<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoalbumController extends Controller
{
    public function index(){
        return view('photoalbum.index');
    }
}

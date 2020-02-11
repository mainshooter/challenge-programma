<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class Cms extends Controller
{
    public function index(Request $request) {
      $Pages = Page::all();
      return view("cms/index", [
        "Pages" => $Pages,
      ]);
    }

    public function viewPage(Request $request) {

    }
}

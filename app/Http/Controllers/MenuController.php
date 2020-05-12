<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request) {
      if (!$request->has('menu')) {
        return redirect()->route('menu.index', ['menu' => 1]);
      }
      return view('menu.index');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Event;

class EventController extends Controller
{
    public function index(Request $request) {
      $aEvents = Event::all();
      return view('event/index', [
        "aEvents" => $aEvents,
      ]);
    }
}

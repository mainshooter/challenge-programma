<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Event;

class EventController extends Controller
{
    /**
     * Presents overview of all Events
     * @param  Request $request
     */
    public function index(Request $request) {
      $aEvents = Event::all();
      return view('event/index', [
        "aEvents" => $aEvents,
      ]);
    }

    public function edit(Request $request, $iId) {
      
    }
}

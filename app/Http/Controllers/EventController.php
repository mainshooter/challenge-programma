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

    /**
     * Presents the agenda
     * @param  Request $request
     */
    public function agenda(Request $request) {
      $aEvents = Event::all();
      $aEvents = eventToAgendaItems($aEvents);
      $sEvents = json_encode($aEvents);
      return view('event/agenda', [
        'sEvents' => $sEvents,
      ]);
    }

    /**
     * Finds a agenda item based on it and returns the agenda in json
     * @param  Request $request
     * @param  int  $iId        The id of the event
     * @return string           the json of the event
     */
    public function agendaDetails(Request $request, $iId) {
      $oEvent = Event::find($iId);
      return response()->json($oEvent);
    }
}

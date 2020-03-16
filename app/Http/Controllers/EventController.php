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
     * Presents the form to add a event
     * @param  Request $request
     */
    public function createPage(Request $request) {
      return view("event/create");
    }

    /**
     * Handles the post request to add a event
     * @param  Request $request
     */
    public function create(Request $request) {
      $request->validate([
        'event_name' => 'required|max:255',
        'event_description' => 'required',
        'event_points' => 'required|integer',
        'event_start_date_time' => 'required|date_format:Y/m/d H:i',
        'event_end_date_time' => 'required|date_format:Y/m/d H:i|after:event_start_date_time',
        'event_straat' => 'required|max:255',
        'event_city' => 'required|max:255',
        'event_house_number' => 'required|integer',
        'event_house_number_addition' => 'nullable|max:1',
        'event_zipcode' => 'required|max:6|min:6|regex:/^\d{4}[a-z]{2}$/i',
      ]);

      $oEvent = new Event();

      $oEvent->name = $request->event_name;
      $oEvent->description = $request->event_description;
      $oEvent->points = $request->event_points;
      $oEvent->street = $request->event_straat;
      $oEvent->city = $request->event_city;
      $oEvent->house_number = $request->event_house_number;
      $oEvent->house_number_addition = $request->event_house_number_addition;
      $oEvent->zipcode = $request->event_zipcode;
      $oEvent->event_start_date_time = $request->event_start_date_time;
      $oEvent->event_end_date_time = $request->event_end_date_time;

      $oEvent->save();

      return redirect()->route('event.index');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Event;
use Auth;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\StudentEventRegister;

class EventController extends Controller
{
    /**
     * Presents overview of all Events
     * @param  Request $request
     */
    public function index(Request $request) {
      $aEventsAccepted = Event::all()->where('is_accepted', true);
      $aEventsOpen = Event::all()->where('is_accepted', false);
      return view('event/index', [
        "aEventsAccepted" => $aEventsAccepted, "aEventsOpen" => $aEventsOpen
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
        'event_max_students' => 'nullable|integer|min:0',
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
      $oEvent->max_students = $request->event_max_students;
      $oEvent->street = $request->event_straat;
      $oEvent->city = $request->event_city;
      $oEvent->house_number = $request->event_house_number;
      $oEvent->house_number_addition = $request->event_house_number_addition;
      $oEvent->zipcode = $request->event_zipcode;
      $oEvent->event_start_date_time = $request->event_start_date_time;
      $oEvent->event_end_date_time = $request->event_end_date_time;

      if(Auth::user()->role == 'admin'){
          $oEvent->is_accepted = true;
      }

      $oEvent->save();

      return redirect()->route('event.index');
    }

    public function editPage(Request $request, $iId) {
      $oEvent = Event::find($iId);

      if (is_null($oEvent)) {
        return redirect()->route('event.index');
      }

      return view('event/edit', [
        'oEvent' => $oEvent
      ]);
    }

    public function edit(Request $request, $iId) {
      $request->validate([
        'event_name' => 'required|max:255',
        'event_description' => 'required',
        'event_points' => 'required|integer',
        'event_max_students' => 'nullable|integer|min:0',
        'event_start_date_time' => 'required|date_format:Y/m/d H:i',
        'event_end_date_time' => 'required|date_format:Y/m/d H:i|after:event_start_date_time',
        'event_straat' => 'required|max:255',
        'event_city' => 'required|max:255',
        'event_house_number' => 'required|integer',
        'event_house_number_addition' => 'nullable|max:1',
        'event_zipcode' => 'required|max:6|min:6|regex:/^\d{4}[a-z]{2}$/i',
      ]);

      $oEvent = Event::find($iId);
      if (is_null($oEvent)) {
        return redirect()->route('event.index');
      }

      $oEvent->name = $request->event_name;
      $oEvent->description = $request->event_description;
      $oEvent->points = $request->event_points;
      $oEvent->max_students = $request->event_max_students;
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

    public function delete(Request $request, $iId) {
        $oEvents = Event::find($iId);
        $oEvents->delete();

        return redirect()->route('event.index');
    }

    public function details(Request $request, $iId){
        $oEvent = Event::find($iId);
        if (is_null($oEvent)) {
            abort(404);
        }else{
            return view('event.details', ['oEvent' => $oEvent]);
        }
    }

    public function accept(Request $request, $iId){
        $oEvent = Event::find($iId);
        $oEvent->is_accepted = true;
        $oEvent->save();
        return redirect()->route('event.index');
    }

    public function studentRegisterPage(Request $request, $iId) {
      $oEvent = Event::find($iId);

      if (is_null($oEvent)) {
        return redirect()->route('event.agenda');
      }

      return view('event/student/register', [
        'oEvent' => $oEvent
      ]);
    }

    public function studentRegister(Request $request, $iId) {
      $oEvent = Event::find($iId);

      if (is_null($oEvent)) {
        return redirect()->route('event.agenda');
      }
      $oUser = Auth::user();
      if (!$oEvent->students->contains($oUser)) {
        if (is_null($oEvent->max_students) || $oEvent->max_students < $oEvent->students->count() || $oEvent->max_students === 0) {
          $oEvent->students()->save($oUser);
          Mail::to($oUser->email)->send(new StudentEventRegister($oEvent, $oUser));
          Session::flash('message', 'U bent toegevoegd aan het event');
        }
        else {
          Session::flask('message', 'Het maximum van het aantal studenten voor dit evenement is bereikt.');
        }
      }
      else {
        Session::flash('message', 'U bent al toegevoegd aan het event');
      }

      return redirect()->route('event.agenda');
    }
}

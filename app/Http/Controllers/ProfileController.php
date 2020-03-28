<?php

namespace App\Http\Controllers;

use App\Event;
use App\StudentEvent;
use App\User;
use App\StudentInfo;
use Auth;
use Illuminate\Http\Request;
use http\Message;
use Session;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $oUser = Auth::user();

        // alle student_info event rows van deze student/user
        $allEvents = StudentEvent::where('student_id', '=', $oUser->id)->get();
        $points_decision = (StudentInfo::find($oUser->id))->points_decision;

        $points = 0;
        foreach ($allEvents as $studentEvent) { //studentEvent contains event_id 
            $eventId = $studentEvent->event_id;
            $event = Event::find($eventId);
            
            if($studentEvent->was_present){
                $points += $event->points;
            }
        }
        
        return view('profile/index', ["oUser" => $oUser,'pointsType' => $points_decision, 'points' => $points]);
    }

    public function terminatePage(Request $request)
    {
        $oUser = Auth::user();
        return view("profile/terminate", ["oUser" => $oUser]);
    }

    public function terminate(Request $request)
    {
        $oUser = Auth::user();

        Auth::logout();

        if ($oUser->delete()) {
            Session::flash('message', 'Je bent uitgeschreven');
            return redirect()->route('profile.index');
        } else {
            Session::flash('message', 'Je kan helaas niet uitschrijven, neem contact op met de systeem administrator');
            return view("profile/terminate");
        }
    }
}

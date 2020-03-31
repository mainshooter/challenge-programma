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

        $aAllEvents = StudentEvent::where('student_id', '=', $oUser->id)->get(); //was present
        $sPoints_decision = $oUser->studentInfo->points_decision;
        $iPoints = 0;
        foreach ($aAllEvents as $studentEvent) { //studentEvent contains event_id 
            if($studentEvent->was_present){
                foreach($oUser->events as $event){
                    $points += $event->points;
                }
            }
        }
        
        return view('profile/index', ["oUser" => $oUser, 'sPoints_decision' => $sPoints_decision, 'iPoints' => $iPoints]);
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

        if($oUser->delete()) {
            return redirect()->route('login')->with('message', 'Je bent uitgeschreven');
        }
        else {
            return view("profile/terminate")->with('message', 'Je kan helaas niet uitschrijven, neem contact op met de systeem administrator');
        }
    }
}

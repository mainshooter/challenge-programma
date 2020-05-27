<?php

namespace App\Http\Controllers;

use App\Event;
use App\Photoalbum;
use App\StudentEvent;
use App\User;
use App\StudentInfo;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use http\Message;
use Session;
use DateTime;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $oUser = Auth::user();
        $aAllEvents = $oUser->events;

        $iPoints = 0;
        $sSortType = $request->selectSort;

        if($sSortType == "futureevents") {
            $aAllEvents = Array();
            foreach($oUser->events as $oEvent) {
                $oDate = new Carbon($oEvent->event_start_date_time);
                if($oDate->greaterThan(Carbon::now())) {
                    array_push($aAllEvents, $oEvent);
                }
            }
        }
        else {
            $aAllEvents = $oUser->events;
        }

        foreach ($aAllEvents as $oEvent) { //studentEvent contains event_id
            if($oEvent->pivot->was_present) {
              $iPoints += $oEvent->points;
            }
        }
        return view('profile/index', ["oUser" => $oUser, 'iPoints' => $iPoints, "sSortType" => $sSortType, "aAllEvents" => $aAllEvents]);
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

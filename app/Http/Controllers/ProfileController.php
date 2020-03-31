<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Auth;
use Illuminate\Http\Request;
use http\Message;
use Session;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $oUser = Auth::user();
        $aEvents = Event::all()->where("user_id", $oUser->id);
        return view('profile/index', ["oUser" => $oUser, "aEvents" => $aEvents]);
    }

    public function terminatePage(Request $request) {
        $oUser = Auth::user();
        return view("profile/terminate", ["oUser" => $oUser]);
    }

    public function terminate(Request $request) {
        $oUser = Auth::user();
        $aEvents = Event::all()->where("user_id", $oUser->id);

        $oAdmin = User::find(1);
        foreach($aEvents as $oEvent) {
            $oEvent->organiser()->updateExistingPivot($oEvent, ['user_id' => 1,
                ]);
        }
        Auth::logout();

        if($oUser->delete()) {
            return redirect()->route('login')->with('message', 'Je bent uitgeschreven');
        }
        else {
            return view("profile/terminate")->with('message', 'Je kan helaas niet uitschrijven, neem contact op met de systeem administrator');
        }
    }
}

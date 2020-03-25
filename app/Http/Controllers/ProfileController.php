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
        return view('profile/index', ["oUser" => $oUser]);
    }

    public function details(Request $request){
        $oUser = Auth::user();
        if (is_null($oUser)) {
            return redirect()->route('profile.index');
        }else{
            return view('profile.details', ['oUser' => $oUser]);
        }
    }

    public function terminatePage(Request $request) {
        $oUser = Auth::user();
        return view("profile/terminate", ["oUser" => $oUser]);
    }

    public function terminate(Request $request) {
        $oUser = Auth::user();

        Auth::logout();

        if($oUser->delete()) {
            Session::flash('message', 'Je bent uitgeschreven');
            return redirect()->route('profile.index');
        }
        else {
            Session::flash('message', 'Je kan helaas niet uitschrijven, neem contact op met de systeem administrator');
            return view("profile/terminate");
        }
    }
}

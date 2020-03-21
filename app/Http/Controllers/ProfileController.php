<?php

namespace App\Http\Controllers;

use App\User;
use App\Event;
use Auth;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $oUser = Auth::user();
        $aEvents = Event::all()->where(students.contains($oUser));

        return view('profile/index', ["aEvents" => $aEvents]);
    }

    public function terminatePage(Request $request) {
        return view("profile/terminate");
    }

    public function terminate(Request $request) {
        $oUser = User::find(Auth::user()->id);

        Auth::logout();

        if($oUser->delete()) {
            Session::flash('message', 'Je bent uitgeschreven');
            return redirect()->route('profile.index');
        }
    }
}

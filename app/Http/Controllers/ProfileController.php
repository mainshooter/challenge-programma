<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use http\Message;
use Session;

class ProfileController extends Controller
{
    public function index(Request $request) {
        return view('profile/index');
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
    }
}

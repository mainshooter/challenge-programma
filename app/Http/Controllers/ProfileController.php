<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request) {
        return view('profile/index');
    }

    public function terminatePage(Request $request) {
        $oUser = User::find(Auth::user()->id);
        return view("profile/terminate", ["oUser" => $oUser]);
    }

    public function terminate(Request $request) {
        $oUser = User::find(Auth::user()->id);

        Auth::logout();

        if($oUser->delete()) {
            return redirect()->route('profile.index')->with('global', 'Je ben uitgeschreven.');
        }
    }
}

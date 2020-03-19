<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request) {
        $oUser = User::find(Auth::user()->id);
        return view('profile/index', ["oUser" => $oUser]);
    }

    public function terminatePage(Request $request) {
        $oUser = User::find(Auth::user()->id);
        return view("profile/terminate", ["oUser" => $oUser]);
    }

    public function terminate(Request $request, $iId) {
        $oUser = User::find($iId);

        $oUser->delete();

        return redirect()->route('profile.index');
    }
}

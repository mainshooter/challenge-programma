<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\User;

class ProfileController extends Controller
{
    public function index(Request $request) {
        return view('profile/index');
    }

    public function delete(Request $request, $iId) {
        $oUser = User::find($iId);
        return Redirect()->route('profile.terminate', ['oUser' => $oUser]);
    }

    public function terminate(Request $request, $iId) {
        $oUser = User::find($iId);

        if(!is_null($oUser)) {
            $oUser->delete();
        }
        return redirect()->route('homepage.index');
    }
}

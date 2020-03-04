<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{
    public function index(Request $request) {
      $aUsers = User::all();
      return view("user/index", [
        'aUsers' => $aUsers
      ]);
    }

    public function edit(Request $request, $iId) {
      $validatedData = $request->validate([
        "name" => "required",
      ]);

      $oUser = User::find($iId);
      if (is_null($oUser)) {
        return redirect()->route('user.index');
      }

      $oUser->name = $request->name;


    }
}

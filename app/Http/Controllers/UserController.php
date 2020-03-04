<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{

    /**
     * Presents a overview of all users
     * @param  Request $request
     */
    public function index(Request $request) {
      $aUsers = User::all();
      return view("user/index", [
        'aUsers' => $aUsers
      ]);
    }

    /**
     * Saves a user on post request for new changes
     * @param  Request $request
     * @param  int  $iId        The ID of the user
     */
    public function edit(Request $request, $iId) {
      $validatedData = $request->validate([
        "name" => "required",
        "email" => "required|email|unique:users",
        "role" => "regex:(student|admin|company)",
      ]);

      $oUser = User::find($iId);

      if (is_null($oUser)) {
        return redirect()->route('user.index');
      }

      $oUser->name = $request->name;
      $oUser->email = $request->email;
      $oUser->role = $request->role;

      $oUser->save();

      return redirect()->route('user.index');
    }
}

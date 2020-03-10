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

    public function update($iId){
        $oUser = User::find($iId);
        return view("user/update_user", ["User" => $oUser] );
    }

    /**
     * Saves a user on post request for new changes
     * @param  Request $request
     * @param  int  $iId        The ID of the user
     */
    public function edit(Request $request, $iId) {
      $validatedData = $request->validate([
        "name" => "required",
        "email" => "required|email",
        "role" => "required", //regex:(student|admin|company)
      ]);

      $oUser = User::find($iId);

      if (is_null($oUser)) {
        return redirect()->route('user.index');
      }

      $oUser->name = $request->get('name');
      $oUser->email = $request->get('email');
      $oUser->role = $request->get('role');

      $oUser->save();

      return redirect()->route('user.index')->with('alert', 'user Info updated');
    }
}

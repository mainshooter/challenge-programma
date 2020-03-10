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

    public function editPage($iId){
        $User = User::find($iId);
        return view("user/update_user", ["User" => $User] );
    }

    /**
     * Saves a user on post request for new changes
     * @param  Request $request
     * @param  int  $iId        The ID of the user
     */
    public function edit(Request $request, $iId) {
      $validatedData = $request->validate([
        "name" => "required|digits_between:1:255",
        "email" => "required|email",
        "role" => "required|regex:(student|admin|company)",
      ]);

      $User = User::find($iId);

      if (is_null($User)) {
        return redirect()->route('user.index');
      }

      $User->name = $request->get('name');
      $User->email = $request->get('email');
      $User->role = $request->get('role');

      $User->save();

      return redirect()->route('user.index')->with('alert', 'user Info updated');
    }
}

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

    public function update($iId){
        $oUser = User::find($iId);
        return view("user/update_user", ["User" => $oUser] );
    }
}

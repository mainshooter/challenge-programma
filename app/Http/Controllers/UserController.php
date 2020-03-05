<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request) {
      $aUsers = \App\User::all();
      return view("user/index", [
        'aUsers' => $aUsers
      ]);
    }

    public function update(){
        return view("user/update_user");
    }
}

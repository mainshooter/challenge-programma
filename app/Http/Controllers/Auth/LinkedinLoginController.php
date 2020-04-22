<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use GuzzleHttp\Client;
use \App\Photoalbum;

class LinkedinLoginController extends Controller
{
  public function loginLinkedin() {
    return Socialite::driver('linkedin')->redirect();
  }

  public function loginLinkedinCallback(Request $request) {
    if ($request->session()->exists('album-id')) {
      $iId = $request->session()->get('album-id');
      $user = Socialite::driver('linkedin')->user();
      $sToken = $user->token;
      $request->session()->put('linkedin-token', $sToken);

      return redirect()->route('photoalbum.publish.execute');
    }
  }
}

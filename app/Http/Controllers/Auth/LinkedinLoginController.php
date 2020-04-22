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

      $oAlbum = Photoalbum::find($iId);
      $oAlbum->is_published = true;
      $sText = $oAlbum->description . ' bekijk hier het fotoalbum ' . route('photoalbum.photos', $oAlbum->id);
      $sLink = route('photoalbum.photos', $oAlbum->id);

      $client = new Client(['base_uri' => 'https://api.linkedin.com']);
      $response = $client->request('POST', '/v2/shares', [
          'headers' => [
              "Authorization" => "Bearer " . $sToken,
              "Content-Type"  => "application/json",
              "x-li-format"   => "json"
          ],
          'owner' => 'urn:li:organization:43351756',
          'content' => [
            'title' => 'Nieuw album!',
            'subject' => 'Album publicatie',
            'text' => [
              'text' => $sText,
            ]
          ]
      ]);
      dd($response->getBody());

      $request->session()->put('linkedin-token', $sToken);
      return redirect()->route('photoalbum.publish.execute');
    }
  }
}

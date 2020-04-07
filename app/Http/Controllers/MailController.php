<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\Mail\MailToUser;
use Illuminate\Support\Facades\Mail;
use Session;

class MailController extends Controller {

  public function createPage() {
    return view('mail/create');
  }

  public function create(Request $request) {
    $request->validate([
      'mail_subject' => 'required|min:3|string',
      'page_content' => 'required|min:3|string'
    ]);

    $sSubject = $request->mail_subject;
    $sText = $request->page_content;

    $aUsers = User::all();
    foreach ($aUsers as $oUser) {
      Mail::to($oUser->email)->send(new MailToUser($sSubject, $sText));
    }

    Session::flash('message', 'De mails zijn verstuurd');
    return redirect()->route('mail.create');
  }

}

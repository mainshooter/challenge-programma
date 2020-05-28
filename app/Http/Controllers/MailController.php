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
      'page_content' => 'required|min:3|string',
      'mail_user_role' => 'required|in:admin,company,student,all,content-writer',
    ]);

    $sRole = $request->mail_user_role;
    $sSubject = $request->mail_subject;
    $sText = $request->page_content;
    $aUsers = [];

    if ($sRole == 'all') {
      $aUsers = User::all();
    }
    else {
      $aUsers = User::where('role', $sRole)->get();
    }

    foreach ($aUsers as $oUser) {
      Mail::to($oUser->email)->queue(new MailToUser($sSubject, $sText));
    }

    Session::flash('message', 'De mails zijn verstuurd');
    return redirect()->route('mail.create');
  }
}

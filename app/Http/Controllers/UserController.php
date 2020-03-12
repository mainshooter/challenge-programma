<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\StudentInfo;
use \App\Mail\AcceptatieMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    /**
     * Presents a overview of all users
     * @param  Request $request
     */
    public function index(Request $request) {
      $aUsers = User::all()->where('is_accepted', true);
      return view("user/index", [
        'aUsers' => $aUsers
      ]);
    }

    public function editPage($iId){
        $oUser = User::find($iId);
        if ($oUser->role == 'student') {
          return view('user/edit_student', [
            'oUser' => $oUser
          ]);
        }
        else if ($oUser->role == 'company') {
          return view('user/edit_company', [
            'oUser' => $oUser,
          ]);
        }
        return view("user/update_user", ["oUser" => $oUser] );
    }

    public function updateStudent(Request $request, $iId) {
      $oUser = User::where([
        'id' => $iId,
        'role' => 'student'
      ])->first();

      if (is_null($oUser)) {
        return redirect()->route('user.index');
      }

      $request->validate([
        'firstname' => ['required', 'string', 'max:50'],
        'middlename'=>['nullable', 'string', 'max:50'],
        'lastname' => ['required', 'string', 'max:50'],
        'phone'=>['nullable', 'regex:/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/', 'min:10','max:13'],
        'schoolyear'=> ['required','integer', 'max:4', 'min:1'],
        'email' => ['required', 'string', 'email', 'max:50', 'unique:users,email,' . $oUser->id],
        "role" => "required|in:student,admin",
      ]);

      $oUser->firstname = $request->firstname;
      $oUser->middlename = $request->middlename;
      $oUser->lastname = $request->lastname;
      $oUser->phone = $request->phone;
      $oUser->email =  $request->email;
      $oUser->role = $request->role;

      $oStudentInfo = StudentInfo::find($iId);
      $oStudentInfo->school_year = $request->schoolyear;
      $oUser->save();
      $oStudentInfo->save();

      return redirect()->route('user.index');
    }

    /**
     * Saves a user on post request for new changes
     * @param  Request $request
     * @param  int  $iId        The ID of the user
     */
    public function edit(Request $request, $iId) {
      $validatedData = $request->validate([
          "name" => "required|Max:255",
          "email" => "required|email",
          "role" => "required|in:student,admin,company",
      ]);

      $oUser = User::find($iId);

      if (is_null($oUser)) {
        return redirect()->route('user.index');
      }

      $oUser->name = $request->get('name');
      $oUser->email = $request->get('email');
      $oUser->role = $request->get('role');

      $oUser->save();

      return redirect()->route('user.index');
    }

    public function notAcceptedStudentsOverview(Request $request) {
        $aUsers = User::All()->where('is_accepted', 0);
        return view("user/accept", [
            'aUsers' => $aUsers
        ]);
    }

    public function deleteUser(Request $request, $iId) {
        $oUser = User::find($iId);

        $oUser->delete();

        return redirect()->route("user.not.accepted.overview");
    }

    public function acceptUser(Request $request, $iId) {
        $oUser = User::find($iId);
        if (is_null($oUser)) {
          return redirect()->route("user.not.accepted.overview");
        }

        $oUser->is_accepted = 1;
        $oUser->save();

        Mail::to($oUser->email)->send(new AcceptatieMail($oUser));

        return redirect()->route("user.not.accepted.overview");
    }
}

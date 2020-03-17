<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\StudentInfo;
use \App\CompanyInfo;
use Session;
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
        else {
          return view("user/edit_admin", ["oUser" => $oUser] );
        }
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

    public function updateCompany(Request $request, $iId) {
      $oUser = User::where([
        'id' => $iId,
        'role' => 'company'
      ])->first();

      if (is_null($oUser)) {
        return redirect()->route('user.index');
      }

      $request->validate([
        'company_name' => 'required|string|max:50',
        'firstname' => 'required|string|max:50',
        'middlename'=> 'nullable|string|max:50',
        'lastname' => 'required|string|max:50',
        'phone'=> ['nullable', 'regex:/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/', 'min:10', 'max:13'],
        'email' => 'required|string|email|max:50|unique:users,email,' . $oUser->id,
        'street' => 'required|max:255',
        'city' => 'required|max:255',
        'house_number' => 'required|integer',
        'house_number_addition' => 'nullable|max:1',
        'zipcode' => 'required|max:6|min:6|regex:/^\d{4}[a-z]{2}$/i',
        "role" => "required|in:company,admin",
      ]);

      $oUser->firstname = $request->firstname;
      $oUser->middlename = $request->middlename;
      $oUser->lastname = $request->lastname;
      $oUser->phone = $request->phone;
      $oUser->email =  $request->email;
      $oUser->role = $request->role;

      $oCompanyInfo = CompanyInfo::find($iId);
      $oCompanyInfo->company_name = $request->company_name;
      $oCompanyInfo->street = $request->street;
      $oCompanyInfo->city = $request->city;
      $oCompanyInfo->house_number = $request->house_number;
      $oCompanyInfo->house_number_addition = $request->house_number_addition;
      $oCompanyInfo->zipcode = $request->zipcode;

      $oUser->save();
      $oCompanyInfo->save();

      return redirect()->route('user.index');
    }

    public function updateAdmin(Request $request, $iId) {
      $oUser = User::where([
        'id' => $iId,
        'role' => 'admin'
      ])->first();

      if (is_null($oUser)) {
        return redirect()->route('user.index');
      }

      $request->validate([
        'firstname' => 'required|string|max:50',
        'middlename'=> 'nullable|string|max:50',
        'lastname' => 'required|string|max:50',
        'phone'=> ['nullable', 'regex:/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/', 'min:10', 'max:13'],
        'email' => 'required|string|email|max:50|unique:users,email,' . $oUser->id,
      ]);

      $oUser->firstname = $request->firstname;
      $oUser->middlename = $request->middlename;
      $oUser->lastname = $request->lastname;
      $oUser->phone = $request->phone;
      $oUser->email =  $request->email;

      $oUser->save();

      return redirect()->route('user.index');
    }

    public function notAcceptedUserOverview(Request $request) {
        $aUsers = User::All()->where('is_accepted', 0);
        return view("user/accept", [
            'aUsers' => $aUsers
        ]);
    }

    public function details(Request $request, $iId) {
      $oUser = User::find($iId);
      if (is_null($oUser)) {
        return redirect()->route('user.index');
      }

      if ($oUser->role == 'company') {
        return view('user/details/company', [
          'oUser' => $oUser
        ]);
      }
      else if ($oUser->role == 'student') {
        return view('user/details/student', [
          'oUser' => $oUser
        ]);
      }
    }
    public function deleteUser(Request $request, $iId) {
        $oUser = User::find($iId);

        $oUser->delete();

        Session::flash('message', 'Gebruiker is verwijderd');
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

        Session::flash('message', 'Gebruiker is geaccepteerd');
        return redirect()->route("user.not.accepted.overview");
    }
}

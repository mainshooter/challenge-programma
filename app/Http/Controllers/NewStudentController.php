<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Student;
use \App\User;
use Illuminate\Support\Facades\Mail;
use \App\Mail\AcceptatieMail;

class NewStudentController extends Controller
{
    public function index(Request $request) {
        $aStudents = Student::all();
        return view("newstudent/index", [
            'aStudents' => $aStudents
        ]);
    }

    public function delete(Request $request, $iId) {
        $oStudent = Student::find($iId);

        if (!is_null($oStudent)) {
            $oStudent->delete();
        }
        return redirect()->route("newstudent.index");
    }

    public function accept(Request $request, $iId) {
        $oStudent = Student::find($iId);

        if (!is_null($oStudent)) {
            $oUser = new User();
            $oUser->name = $oStudent->firstname;
            $oUser->email = $oStudent->email;
            $oUser->password = $oStudent->password;
            $oUser->role = 'student';
            $oUser->save();

            Mail::to($oUser->email)->send(new AcceptatieMail($oUser));
        }


      return redirect()->route("newstudent.index");
    }
}

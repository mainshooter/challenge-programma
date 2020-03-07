<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewStudentController extends Controller
{
    public function index(Request $request) {
        $aStudents = \App\Student::all();
        return view("newstudent/index", [
            'aStudents' => $aStudents
        ]);
    }
}

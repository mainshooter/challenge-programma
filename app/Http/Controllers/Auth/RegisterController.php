<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\Http\Controllers\Controller;
use App\User;
use App\StudentInfo;
use App\CompanyInfo;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the register dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createStudentPage(Request $request)
    {
        return view('auth/register/register_students');
    }

    public function createStudent(Request $request) {
      $request->validate([
        'firstname' => ['required', 'string', 'max:50'],
        'middlename'=>['nullable', 'string', 'max:50'],
        'lastname' => ['required', 'string', 'max:50'],
        'phone'=>['nullable', 'regex:/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/', 'min:10','max:13'],
        'schoolyear'=>['required','integer', 'max:10'],
        'email' => ['required', 'string', 'email', 'max:50', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);

      $oUser = new User();
      $oUser->firstname = $request->firstname;
      $oUser->middlename = $request->middlename;
      $oUser->lastname = $request->lastname;
      $oUser->phone = $request->phone;
      $oUser->email =  $request->email;
      $oUser->password = Hash::make($request->password);
      $oUser->is_accepted = 0;
      $oUser->role = 'student';
      $oUser->save();


      $oStudentInfo = new StudentInfo();
      $oStudentInfo->school_year = $request->schoolyear;
      $oStudentInfo->user_id = $oUser->id;
      $oStudentInfo->save();

      return redirect()->route('home');
    }

    public function createCompany(Request $request) {
      return redirect()->route('home');
    }
}



?>

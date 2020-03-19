<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Session;
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
        return view('auth/register/register_student');
    }

    public function createStudent(Request $request) {
      $request->validate([
        'firstname' => ['required', 'string', 'max:50'],
        'middlename'=>['nullable', 'string', 'max:50'],
        'lastname' => ['required', 'string', 'max:50'],
        'phone'=>['required','regex:/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/', 'min:10','max:13'],
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

      Session::flash('message', 'Uw Registratie was succesvol. U ontvangt een bericht zodra uw account is goedgekeurd');
      return redirect()->route('home');
    }

    public function createCompanyPage(Request $request) {
      return view('auth/register/register_company');
    }

    public function createCompany(Request $request) {
      $request->validate([
        'company_name' => 'required|string|max:50',
        'firstname' => 'required|string|max:50',
        'middlename'=> 'nullable|string|max:50',
        'lastname' => 'required|string|max:50',
        'phone'=> ['required', 'regex:/^((\+|00(\s|\s?\-\s?)?)31(\s|\s?\-\s?)?(\(0\)[\-\s]?)?|0)[1-9]((\s|\s?\-\s?)?[0-9])((\s|\s?-\s?)?[0-9])((\s|\s?-\s?)?[0-9])\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]\s?[0-9]$/', 'min:10', 'max:13'],
        'email' => 'required|string|email|max:50|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'street' => 'required|max:255',
        'city' => 'required|max:255',
        'house_number' => 'required|integer',
        'house_number_addition' => 'nullable|max:1',
        'zipcode' => 'required|max:6|min:6|regex:/^\d{4}[a-z]{2}$/i',
      ]);

      $oUser = new User();
      $oUser->firstname = $request->firstname;
      $oUser->middlename = $request->middlename;
      $oUser->lastname = $request->lastname;
      $oUser->phone = $request->phone;
      $oUser->email =  $request->email;
      $oUser->password = Hash::make($request->password);
      $oUser->is_accepted = 0;
      $oUser->role = 'company';
      $oUser->save();

      $oCompanyInfo = new CompanyInfo();
      $oCompanyInfo->company_name = $request->company_name;
      $oCompanyInfo->street = $request->street;
      $oCompanyInfo->city = $request->city;
      $oCompanyInfo->house_number = $request->house_number;
      $oCompanyInfo->house_number_addition = $request->house_number_addition;
      $oCompanyInfo->zipcode = $request->zipcode;
      $oCompanyInfo->user_id = $oUser->id;
      $oCompanyInfo->save();

      Session::flash('message', 'Uw Registratie was succesvol. U ontvangt een bericht zodra uw account is goedgekeurd');
      return redirect()->route('home');
    }
}



?>

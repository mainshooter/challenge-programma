<?php

namespace App\Http\Controllers\Auth;

//overwrite vendor/laravel/framework/src/Illuminate/Foundation/Auth/RegistersUsers.php
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\Http\Controllers\Controller;
use App\Models\Students;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StudentRegisterController extends Controller
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
    public function showGlobalRegisterForm()
    {
        return view('auth\register\global_register');
    }

    public function showStudentRegisterForm(Request $request)
    {
        return view('auth/register/register_students');
    }

    public function create(Request $request) {
      $request->validate([
        'firstname' => ['required', 'string', 'max:255'],
        'prefix'=>['nullable', 'string', 'max:255'],
        'lastname' => ['required', 'string', 'max:255'],
        'phone'=>['nullable', 'string', 'max:11'],
        'schoolyear'=>['required','integer', 'max:10'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);

      $oStudent = new Students();

      $oStudent->firstname = $request->firstname;
      $oStudent->prefix = $request->prefix;
      $oStudent->lastname = $request->lastname;
      $oStudent->phone = $request->phone;
      $oStudent->schoolyear = $request->schoolyear;
      $oStudent->email =  $request->email;
      $oStudent->password = $request->password;

      $oStudent->save();

      return redirect()->route('home');
    }

    public function showCompanyRegisterForm()
    {
        return view('auth/register/register_company');
    }
}

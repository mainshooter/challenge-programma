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

    public function showStudentRegisterForm()
    {
        return view('auth\register\register_students');
    }

    public function showCompanyRegisterForm()
    {
        return view('auth\register\register_company');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'prefix'=>['nullable', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone'=>['nullable', 'string', 'max:11'],
            'schoolyear'=>['required','integer', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Students
     */
    protected function create(array $data)
    {
        return Students::create([
            'firstname' => $data['firstname'],
            'prefix'    => $data['prefix'],
            'lastname'    => $data['lastname'],
            'phone'    => $data['phone'],
            'schoolyear'    => $data['schoolyear'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // public function store(Request $request)
    // {
    //     // Validate the request...

    //     $student = new Students();

    //     $student->name = $request->name;

    //     $student->save();
    // }


    /**
     * OVERWRITES RegistersUsers.php
     *
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // this enables auto login after registration
        // we dont want this to its commented
        //$this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    // public function username()
    // {
    //     return 'id';
    // }

    // protected function guard()
    // {
    //     return Auth::guard('students');
    // }
}

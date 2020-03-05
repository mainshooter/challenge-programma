<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use App\Http\Controllers\Controller;
use App\Company;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CompanyRegisterController extends Controller
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
    public function index(Request $request)
    {
      return view('auth/register/register_company');
    }

    public function create(Request $request) {
      $request->validate([
        'firstname' => ['required', 'string', 'max:50'],
        'prefix'=>['nullable', 'string', 'max:50'],
        'lastname' => ['required', 'string', 'max:50'],
        'companyname' => ['required', 'string', 'max:50'],
        'address' => ['required', 'string', 'max:60'],
        'postal-code' => ['required', 'string', 'max:10'],
        'phone'=>['nullable', 'string', 'max:13'],
        'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);

      $oCompany = new Company();

      $oCompany->firstname = $request->firstname;
      $oCompany->prefix = $request->prefix;
      $oCompany->lastname = $request->lastname;
      $oCompany->companyname = $request->companyname;
      $oCompany->address = $request->address;
      $oCompany->postalcode = $request['postal-code'];
      $oCompany->phone = $request->phone;
      $oCompany->email =  $request->email;
      $oCompany->password = Hash::make($request->password);

      $oCompany->save();
      
      return redirect()->route('home');
    }
}

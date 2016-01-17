<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
//use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Session;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    //protected $redirectTo = 'dashboard';
    //protected $loginPath = 'login';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        //$this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }
    
   /* public function authenticate(Request $request)
    {  
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {   die("erfolgreih");
            return redirect()->intended('dashboard');
        }
    }
    */
    
     public function postLogin(Request $request)
     {
         //pass through validation rules
         $this->validate($request, ['email' => 'required', 'password' => 'required']);

         $credentials = [
             'email' => trim($request->get('email')),
             'password' => trim($request->get('password'))
         ];



         //log in the user
         if (Auth::attempt($credentials)) {
         	  $request->session()->put('key', 'value');
         	 
             return redirect()->intended('/dashboard');
         }

         //show error if invalid data entered
         return redirect()->back()->withErrors('Login/Pass do not match')->withInput();
     }
    
    public function getLogin() {
		//echo "test";
		 return view('auth.login');
	}

   public function getLogout() {
		
		 return $this->logout();
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/home';
	protected $username = 'login';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
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
            'login' => 'required|max:100|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

	//----
		public function authenticatex(Request $request)
         {
         //pass through validation rules
         $this->validate($request, ['email' => 'required', 'password' => 'required']);


         $credentials = [
             'email' => trim($request->get('email')),
             'password' => trim($request->get('password'))
         ];
         $credentials2 = [
             'login' => trim($request->get('email')),
             'password' => trim($request->get('password'))
         ];


         //log in the user with email adress
         if ( (Auth::attempt($credentials)) || (Auth::attempt($credentials2))) {
         	  
             return redirect()->intended('/home');
         }
         //log in the user with login
         if (Auth::attempt($credentials2)) {
         	  
             return redirect()->intended('/home');
         }
         //show error if invalid data entered
         return redirect()->back()->withErrors('Login/Pass do not match')->withInput();
     }
	
	//---------
	
	  public function getLolgout() {
		Auth::logout();
		        $this->auth->logout();
			Session::flush();
        return redirect('/');
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
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'login' => $data['login'],
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


	public function __construct() {
		$this->middleware('guest:admin',['except' => ['logout']]);
	}


	public function showLoginForm() {
		return view('admin.auth.login');
	}


	public function login(Request $request) {

		$this->validate($request,[
			'email' => 'required|email',
			'password' => 'required|min:6'
		]);

		//attempt to login the admins in
		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
			//if successful redirect to admin dashboard
			return redirect()->intended(route('admin.dashboard'));
		}
		//if unsuccessfull redirect back to the login for with form data
		return redirect()->back()->withInput($request->only('email','remember'));
	}

	public function logout() {
		Auth::guard('admin')->logout();

		return redirect('/');
	}
}

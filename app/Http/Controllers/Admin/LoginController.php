<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LoginController extends Controller
{

	use AuthenticatesUsers;

	/*
	* redirect after login 
	* @var staring
	*/
	protected $redirectTo = '/admin';

	/* 
	* Create a new controller instance
	* @return void
	*/
	public function __construct(){
		
		\Log::info("Request= Admin/LoginController@__construct called");

		$this->middleware('guest:admin')->except('logout');
	}

	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
	public function showLoginForm(){
		
		\Log::info("Request= Admin/LoginController@showLoginForm called");

		return view('admin.auth.login');
	}

	public function login(Request $request){
		
		\Log::info("Request= Admin/LoginController@login called");

		$request->validate([
			'email' => 'required|email|max:30',
			'password' => 'required|max:20|min:5'
		]);

		if(Auth::guard('admin')->attempt([
			'email' => $request->email,
			'password' => $request->password
		], $request->get('remember'))){
			
			return redirect()->intended(route('admin.dashboard'));
		}
		
		return back()->withInput($request->only('email', 'password'));
		
	}

	public function logout(Request $request){
		\Log::info("Request= Admin/LoginController@logout called");

		Auth::guard('admin')->logout();
		$request->session()->invalidate();

		return redirect()->route('admin.login');
		
	}
}

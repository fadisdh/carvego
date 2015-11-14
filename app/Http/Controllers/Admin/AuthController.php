<?php

namespace App\Http\Controllers\Admin;

use App\SystemUser;
use Auth;
use Input;
use Session;
use Hash;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

	public function login(){
		return view('admin.common.login');
	}

	public function getLogin(){
		if (Auth::attempt(['email' => Input::get('email'), 'password' => Input::get('password'), 'admin' => true])) {
            return redirect()->intended(route('admin.home'));
        }

        return back()->withInput()
        			->withErrors([
        				'message' => 'Username and/or Passsword is wrong'
        			]);
	}

	public function logout(){
		Auth::logout();
		return redirect()->route('admin.login');
	}
}
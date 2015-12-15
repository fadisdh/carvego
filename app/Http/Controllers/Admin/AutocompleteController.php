<?php

namespace App\Http\Controllers\Admin;

use Input;
use DB;
use App\User;
use App\Role;
use App\Http\Controllers\Controller;

class AutoCompleteController extends Controller
{

	public function systemUser(){
		$q = Input::get('q');
		$users = User::select('*', DB::raw('CONCAT(firstname, " ", lastname, " - ", email) as identity'))
						->where('admin', 1)
						->where(function($query) use($q){
							$query->where('firstname', 'LIKE', "%$q%")
								->orWhere('lastname', 'LIKE', "%$q%")
								->orWhere('email', 'LIKE', "%$q%");
						})->lists('identity', 'id');

		return response()->json($users);
	}

	public function user(){
		$q = Input::get('q');
		$users = User::select('*', DB::raw('CONCAT(firstname, " ", lastname, " - ", email) as identity'))
						->where('admin', '<>', 1)
						->where(function($query) use($q){
							$query->where('firstname', 'LIKE', "%$q%")
								->orWhere('lastname', 'LIKE', "%$q%")
								->orWhere('email', 'LIKE', "%$q%");
						})->lists('identity', 'id');

		return response()->json($users);
	}

	public function role(){
		$q = Input::get('q');
		$users = Role::
						where('name', 'LIKE', "%$q%")
						->lists('name', 'id');

		return response()->json($users);
	}
}
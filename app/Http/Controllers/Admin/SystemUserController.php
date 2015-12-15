<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Request;
use Hash;
use Input;
use DB;
use App\Http\Controllers\Controller;

class SystemUserController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index(){
		$q = Input::get('q');
		$systemUsers = User::where('admin', true);

		if($q){
			$systemUsers->where(function($query) use($q){
				$query->where('firstname', 'LIKE', "%$q%")
					->orWhere('lastname', 'LIKE', "%$q%")
					->orWhere('email', 'LIKE', "%$q%");
			});
		}

		if(Input::Get('autocomplete')){
			$systemUsers = $systemUsers
								->select('*', DB::raw('CONCAT(firstname, " ", lastname, " - ", email) as identity'))
								->lists('identity', 'id');
			return response()->json($systemUsers);
		}else{
			$systemUsers = $systemUsers->get();
		}

		if(Request::ajax()){
			return response()->json(jsonResult(true, 'Success', $systemUsers));
		}else{
			return view('admin.systemuser.index')->with([
				'systemUsers'	=> $systemUsers
			]);
		}
	}

	/**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function create(){
		$systemUser = new User();
		return view('admin.systemuser.create')->with([
			'systemUser'	=> $systemUser
		]);
	}

	/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	public function store(){
		return $this->update(0);
	}

	/**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function show($id){
		$systemUser = User::where('id', $id)->where('admin', true)->firstOrFail();
		if(Request::ajax()){
			return response()->json(jsonResult(true, 'Success', $systemUser));
		}else{
			return view('admin.systemuser.show')->with([
				'systemUser'	=> $systemUser
			]);
		}
	}

	/**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function edit($id){
		$systemUser = User::where('id', $id)->where('admin', true)->firstOrFail();
		return view('admin.systemuser.edit')->with([
			'systemUser'	=> $systemUser
		]);
	}


	/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function update($id){
		if($id == 0){
			$systemUser = new User();
		}else{
			$systemUser = User::where('id', $id)->where('admin', true)->firstOrFail();	
		}

		$result = [];

		$validator = $systemUser->validate(Input::all());
		if($validator->passes()){
			if($this->save($systemUser)){
				$result = jsonResult(true, 'Success');
			}else{
				$result = jsonResult(false, 'Error in Saving');
			}
		}else{
			$result = jsonResult(false, 'Error in Validation');
		}

		if(Request::ajax()){
			return view()->json($result);
		}else{
			if($result['status']){
				return redirect()->route('admin.systemuser.show', $systemUser->id)->with($result);
			}else{
				return redirect()->back()->withErrors($validator);
			}
		}
	}

	/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function destroy($id){
		$systemUser = User::where('id', $id)->where('admin', true)->firstOrFail();
		$result = [];

		if($systemUser->delete()){
			$result = jsonResult(true, 'Success');
		}else{
			$result = jsonResult(false, 'Failed');
		}

		if(Request::ajax()){
			return response()->json($result);
		}else{
			return rediredct()->route('admin.systemuser.index')->with($result);
		}
	}

	// Private function to save or update the resource
	private function save(&$systemUser){
		$systemUser->firstname = Input::get('firstname');
		$systemUser->lastname = Input::get('lastname');
		$systemUser->email = Input::get('email');
		$systemUser->admin = 1;

		if(Input::get('password') && Input::get('password_confirmation')){
			$systemUser->password = Hash::make(Input::get('password'));
		}

		return $systemUser->save();
	}
}
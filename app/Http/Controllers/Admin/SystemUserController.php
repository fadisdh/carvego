<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Request;
use Hash;
use Input;
use App\Http\Controllers\Controller;

class SystemUserController extends Controller
{
	/**
     * show all rows
     *
     * @param  Request  $request
     * @return Response
     */
	public function index(){
		$systemUsers = User::where('admin', true)->get();
		if(Request::ajax()){
			return response()->json(jsonResult(true, 'Success', $systemUsers));
		}else{
			return view('admin.systemuser.index')->with([
				'systemUsers'	=> $systemUsers
			]);
		}
	}

	/**
     * show all rows
     *
     * @param  Request  $request
     * @return Response
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
     * new row
     *
     * @param  Request  $request
     * @return Response
     */
	public function create(){
		$systemUser = new User();
		return view('admin.systemuser.create')->with([
			'systemUser'	=> $systemUser
		]);
	}

	/**
     * edit a row
     *
     * @param  Request  $request
     * @return Response
     */
	public function edit($id){
		$systemUser = User::where('id', $id)->where('admin', true)->firstOrFail();
		return view('admin.systemuser.edit')->with([
			'systemUser'	=> $systemUser
		]);
	}

	/**
     * save new row
     *
     * @param  Request  $request
     * @return Response
     */
	public function store(){
		return $this->update(0);
	}

	/**
     * save edited row
     *
     * @param  Request  $request
     * @return Response
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
     * delete row
     *
     * @param  Request  $request
     * @return Response
     */
	public function delete($id){
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

	// Private function to save or update the system user
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
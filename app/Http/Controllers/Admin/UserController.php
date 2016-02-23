<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Role;
use Request;
use Hash;
use Input;
use DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $q = Input::get('q');
        $users = User::select('*');//where('admin', '<>', true);

        if($q){
            $users->where(function($query) use($q){
                $query->where('firstname', 'LIKE', "%$q%")
                    ->orWhere('lastname', 'LIKE', "%$q%")
                    ->orWhere('email', 'LIKE', "%$q%");
            });
        }

        if(Input::Get('autocomplete')){
            $users = $users
                    ->select('*', DB::raw('CONCAT(id, " - ", firstname, " ", lastname, " - ", email) as identity'))
                    ->lists('identity', 'id');
            return response()->json($users);
        }else{
            $users = $users->get();
        }

        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $users));
        }else{
            return view('admin.user.index')->with([
                'users'   => $users
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $user = new User();
        $roles = Role::all()->lists('name', 'id');
        
        return view('admin.user.create')->with([
            'user'    => $user,
            'roles'   => $roles
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
        $user = User::find($id);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $user));
        }else{
            return view('admin.user.show')->with([
                'user'    => $user
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
        $user = User::find($id);
        $roles = Role::all()->lists('name', 'id');

        return view('admin.user.edit')->with([
            'user'    => $user,
            'roles'   => $roles
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
            $user = new User();
        }else{
            $user = User::find($id);
        }

        $result = [];

        $validator = $user->validate(Input::all());
        if($validator->passes()){
            if($this->save($user)){
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
                return redirect()->route('admin.user.show', $user->id)->with($result);
            }else{
                return redirect()->back()->withErrors($validator)->withInput();
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
        $user = User::find($id);
        
        $result = [];

        if($user->delete()){
            $result = jsonResult(true, 'Success');
        }else{
            $result = jsonResult(false, 'Failed');
        }

        if(Request::ajax()){
            return response()->json($result);
        }else{
            return rediredct()->route('admin.user.index')->with($result);
        }
    }

    // Private function to save or update the resource
    private function save(&$user){
        $user->firstname = Input::get('firstname');
        $user->lastname = Input::get('lastname');
        $user->email = Input::get('email');


        if(Input::get('password') && Input::get('password_confirmation')){
            $user->password = Hash::make(Input::get('password'));
        }

        return $user->save();
    }
}

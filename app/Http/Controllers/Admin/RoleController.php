<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Request;
use Hash;
use Input;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $q = Input::get('q');

        $roles = Role::select('*');

        if($q){
            $roles->where('name', 'LIKE', "%$q%");
        }

        if(Input::get('autocomplete')){
            $roles = $roles->lists('name', 'id');
            return response()->json($roles);
        }else{
            $roles = $roles->get();
        }

        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $roles));
        }else{
            return view('admin.role.index')->with([
                'roles'   => $roles
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = new Role();
        return view('admin.role.create')->with([
            'role'    => $role
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
        $role = Role::find($id);
        
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $role));
        }else{
            return view('admin.role.show')->with([
                'role'    => $role
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
        $role = Role::find($id);

        return view('admin.role.edit')->with([
            'role'    => $role
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
            $role = new Role();
        }else{
            $role = Role::find($id);
        }

        $result = [];

        $validator = $role->validate(Input::all());
        if($validator->passes()){
            if($this->save($role)){
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
                return redirect()->route('admin.role.show', $role->id)->with($result);
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
       $role = Role::find($id);
        
       $result = [];

       if($role->delete()){
           $result = jsonResult(true, 'Success');
       }else{
           $result = jsonResult(false, 'Failed');
       }

       if(Request::ajax()){
           return response()->json($result);
       }else{
           return rediredct()->route('admin.role.index')->with($result);
       }
    }

    // Private function to save or update the resource
    private function save(&$role){
        $role->name = input::get('name');
        $role->permissions = input::get('permissions');

        return $role->save();
    }
}

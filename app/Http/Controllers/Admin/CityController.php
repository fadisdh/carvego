<?php

namespace App\Http\Controllers\Admin;

use App\City;
use Request;
use Hash;
use Input;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::paginate(7);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $cities));
        }else{
            return view('admin.city.index')->with([
                'cities'   => $cities
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
            $city = new City();
                return view('admin.city.create')->with(['city'    => $city ]);

           
           
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return $this->update(0);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $city = City::find($id);
         
         if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $city));
         }else{
                return view('admin.city.show')->with([
                'city'    => $city
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::find($id);

        return view('admin.city.edit')->with([
            'city'    => $city
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
             if($id == 0){
                $city = new City();
            }else{
                $city = City::find($id);
            }

            $result = [];
            
            $validator = $city->validate(Input::all());
            if($validator->passes()){
                if($this->save($city)){
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
                return redirect()->route('admin.city.show', $city->id)->with($result);
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
    public function destroy($id)
    {
         $city = City::find($id);
            
            $result = [];

            if($city->delete()){
                $result = jsonResult(true, 'Success');
            }else{
                $result = jsonResult(false, 'Failed');
            }

            if(Request::ajax()){
                return response()->json($result);
            }else{
                return rediredct()->route('admin.city.index')->with($result);
            }
    }

      private function save(&$city){

            $city->name  = input::get('name');
            $city->country = input::get('country');
            $city->code = input::get('code');
            $city->country_code = input::get('country_code');
            $city->currency = input::get('currency');
            $city->currency_code = input::get('currency_code');

            return $city->save();

      }
}

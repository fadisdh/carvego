<?php

namespace App\Http\Controllers\Admin;

use App\Car;
use Request;
use Hash;
use Input;
use Event;
use App\Http\Controllers\Controller;
use App\Events\CarWasDeleted;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(7);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $cars));
        }else{
            return view('admin.car.index')->with([
                'cars'   => $cars
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
            $car = new Car();
            
            return view('admin.car.create')->with([
                    'car'    => $car
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $car = Car::find($id);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $car));
        }else{
            return view('admin.car.show')->with([
                'car'    => $car
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
        $car = Car::find($id);

        return view('admin.car.edit')->with([
            'car'    => $car
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
                $car = new Car();
            }else{
                $car = Car::find($id);
            }

            $result = [];

            $validator = $car->validate(Input::all());
            if($validator->passes()){


                if($this->save($car)){
                    if (Request::hasFile('image')) {
                        $imagePaths =[];
                        $files = Input::file('image');
                        $count = count($files);
                        foreach ($files as $file) {
                            $imagePaths[] = upload($file,'Cars/'.$car->id);   
                        }
                        $imagePaths = json_encode($imagePaths);
                        $car->image = $imagePaths;

                        $this->save($car);
                        
                    
                }
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
                return redirect()->route('admin.car.show', $car->id)->with($result);
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
            $car = Car::find($id);
            
            $result = [];

            if($car->delete()){
                Event::fire(new CarWasDeleted($car));
                $result = jsonResult(true, 'Success');
            }else{
                $result = jsonResult(false, 'Failed');
            }

            if(Request::ajax()){
                return response()->json($result);
            }else{
                return rediredct()->route('admin.car.index')->with($result);
            }
    }


        // Private function to save or update the  user
    private function save(&$car){


            $car->title = input::get('title');
            $car->description = input::get('description');
            //$car->image = input::get('image');
            $car->price = input::get('price');
            $car->make= input::get('make');
            $car->model = input::get('model');
            $car->year = input::get('year');
            $car->trim = input::get('trim');
            $car->body_style = input::get('body_style');
            $car->doors = input::get('doors');
            $car->cylinders = input::get('cylinders');
            $car->vin = input::get('vin');
            $car->mileage = input::get('mileage');
            $car->exterior_color = input::get('exterior_color');
            $car->interior_color = input::get('interior_color');
            $car->interior_type = input::get('interior_type');
            $car->transmission = input::get('transmission');
            $car->drive_type = input::get('drive_type');
            $car->fuel_type = input::get('fuel_type');
            $car->comfort = input::get('comfort');
            $car->seats = input::get('seats');
            $car->safety = input::get('safety');
            $car->windows = input::get('windows');
            $car->entertainment = input::get('entertainment');
            $car->other = input::get('other');
            $car->user_id = (int) input::get('user_id');

           return $car->save();
    }
}
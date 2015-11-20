<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $car = new Car();

            $car->title = input::get('title');
            $car->description = input::get('description');
            $car->image = input::get('image');
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

           $car->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
           $car = Car::find($id);

            $car->title = input::get('title');
            $car->description = input::get('description');
            $car->image = input::get('image');
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

           $car->save();
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

        $car->delete();
    }
}
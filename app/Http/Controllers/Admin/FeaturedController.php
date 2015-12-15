<?php

namespace App\Http\Controllers\Admin;

use App\Featured;
use Request;
use Hash;
use Input;
use App\Http\Controllers\Controller;

class FeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured = Featured::paginate(7);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $featured));
        }else{
            return view('admin.featured.index')->with([
                'featured'   => $featured
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
            $featured = new Featured();
            
            return view('admin.featured.create')->with([
                    'featured'    => $featured
            ]);
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
        $featured = Featured::find($id);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $featured));
        }else{
            return view('admin.featured.show')->with([
                'featured'    => $featured
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
        $featured = Featured::find($id);

        return view('admin.featured.edit')->with([
            'featured'    => $featured
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
                $featured = new Featured();
            }else{
                $featured = Featured::find($id);
            }

            $result = [];

            $validator = $featured->validate(Input::all());
            if($validator->passes()){
                if($this->save($featured)){
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
                return redirect()->route('admin.featured.show', $featured->id)->with($result);
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
            $featured = Featured::find($id);
            
            $result = [];

            if($featured->delete()){
                $result = jsonResult(true, 'Success');
            }else{
                $result = jsonResult(false, 'Failed');
            }

            if(Request::ajax()){
                return response()->json($result);
            }else{
                return rediredct()->route('admin.featured.index')->with($result);
            }
    }

    private function save(&$featured)
    {
            $featured->type = input::get('type');

            $featured->featured_id = input::get('featured_id');

            return $featured->save();
    }
}

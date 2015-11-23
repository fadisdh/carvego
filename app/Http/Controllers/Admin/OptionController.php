<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = Option::paginate(7);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $options));
        }else{
            return view('admin.option.index')->with([
                'options'   => $options
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
            $option = new Option();
            
            return view('admin.option.create')->with([
                    'option'    => $option
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
        $option = Option::find($id);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $option));
        }else{
            return view('admin.option.show')->with([
                'option'    => $option
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
        $option = Option::find($id);

        return view('admin.option.edit')->with([
            'option'    => $option
        ]);
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
            if($id == 0){
                $option = new Option();
            }else{
                $option = Option::find($id);
            }

            $result = [];

            $validator = $option->validate(Input::all());
            if($validator->passes()){
                if($this->save($option)){
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
                return redirect()->route('admin.option.show', $option->id)->with($result);
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
            $option = Option::find($id);
            
            $result = [];

            if($option->delete()){
                $result = jsonResult(true, 'Success');
            }else{
                $result = jsonResult(false, 'Failed');
            }

            if(Request::ajax()){
                return response()->json($result);
            }else{
                return rediredct()->route('admin.option.index')->with($result);
            }
    }



    private function save(&$option)
    {

            $option->key = input::get('key');
            $option->value = input::get('value');
            $option->type = input::get('type');

            return $option->save();
    }
}

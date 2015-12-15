<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Request;
use Hash;
use Input;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(2);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $pages));
        }else{
            return view('admin.page.index')->with([
                'pages'   => $pages
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
            $page = new Page();
            
            return view('admin.page.create')->with([
                    'page'    => $page
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
        $page = Page::find($id);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $page));
        }else{
            return view('admin.page.show')->with([
                'page'    => $page
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
        $page = Page::find($id);

        return view('admin.page.edit')->with([
            'page'    => $page
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
                $page = new Page();
            }else{
                $page = Page::find($id);
            }

            $result = [];

            $validator = $page->validate(Input::all());
            if($validator->passes()){
                if($this->save($page)){
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
                return redirect()->route('admin.page.show', $page->id)->with($result);
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
    public function destroy($id)
    {
            $page = Page::find($id);
            
            $result = [];

            if($page->delete()){
                $result = jsonResult(true, 'Success');
            }else{
                $result = jsonResult(false, 'Failed');
            }

            if(Request::ajax()){
                return response()->json($result);
            }else{
                return rediredct()->route('admin.page.index')->with($result);
            }
    }


    private function save(&$page)
    {
            $page->title = input::get('title');
            $page->slug= input::get('slug');
            $page->type= input::get('type');
            $page->content= input::get('content');


            return $page->save();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Page;
use Request;
use Hash;
use Input;
use App\Http\Controllers\Controller;
use Event;
use App\Events\PageWasDeleted;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $q = Input::get('q');
        $pages = Page::select('*');

        if($q){
            $pages
                ->where('title', 'LIKE', "%$q%")
                ->orWhere('slug', 'LIKE', "%$q%");
        }

        if(Input::get('autocomplete')){
            $pages = $pages->lists('title', 'id');
            return response()->json($pages);
        }else{
            $pages = $pages->get();
        }

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
    public function create(){
        $page = new Page();
        $page->save();
        return redirect()->route('admin.page.edit', $page->id);
        // return view('admin.page.create')->with([
        //         'page'    => $page
        // ]);
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
    public function edit($id){
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
    public function update($id){
        if($id == 0){
            $page = new Page();
        }else{
            $page = Page::find($id);
        }

        $result = [];

        if (Request::hasFile('image')) {
            $page->image = upload(Input::file('image'), 'Pages'); 
        }

        $validator = $page->validate(Input::all());
        if($validator->passes()){
            if($this->save($page)){
                $result = jsonResult(true, 'Success');
            }else{
                $result = jsonResult(false, 'Error in Saving');
            }
        }elseif(Request::hasFile('image')){
            $page->save();
            $result = jsonResult(true, 'Image Saved');
        }else{
            $result = jsonResult(false, 'Error in Validation');
        }

        if(Request::ajax()){
            return response()->json($result);
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
    public function destroy($id){
        $page = Page::find($id);
        
        $result = [];

        if($page->delete()){
            Event::fire(new PageWasDeleted($page));
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

    // Private function to save or update the resource
    private function save(&$page){
        $page->title = input::get('title');
        $page->slug= input::get('slug');
        $page->type= input::get('type');
        $page->content= input::get('content');
        $page->published= input::get('published');

        return $page->save();
    }
}

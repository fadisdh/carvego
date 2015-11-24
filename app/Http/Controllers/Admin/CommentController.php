<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Request;
use Hash;
use Input;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::paginate(7);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $comments));
        }else{
            return view('admin.comment.index')->with([
                'comments'   => $comments
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
            $comment = new Comment();
            
            return view('admin.comment.create')->with([
                    'comment'    => $comment
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
        $comment = Comment::find($id);
        if(Request::ajax()){
            return response()->json(jsonResult(true, 'Success', $comment));
        }else{
            return view('admin.comment.show')->with([
                'comment'    => $comment
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
        $comment = Comment::find($id);

        return view('admin.comment.edit')->with([
            'comment'    => $comment
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
                $comment = new Comment();
            }else{
                $comment = Comment::find($id);
            }

            $result = [];

            $validator = $comment->validate(Input::all());
            if($validator->passes()){
                if($this->save($comment)){
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
                return redirect()->route('admin.comment.show', $comment->id)->with($result);
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
            $comment = Comment::find($id);
            
            $result = [];

            if($comment->delete()){
                $result = jsonResult(true, 'Success');
            }else{
                $result = jsonResult(false, 'Failed');
            }

            if(Request::ajax()){
                return response()->json($result);
            }else{
                return rediredct()->route('admin.comment.index')->with($result);
            }
    }


    private function save(&$comment)
    {
            $comment->text = input::get('text');
            $comment->user_id = input::get('user_id');
            $comment->comment_id = input::get('comment_id');

            return $comment->save();
    }
}

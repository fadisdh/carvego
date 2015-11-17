<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    //Validation
    public function validate($data){
        return Validator::make($data, [
            'text'     => 'required'
        ]);
    }
}

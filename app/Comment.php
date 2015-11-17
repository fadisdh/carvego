<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function car(){
        return $this->belongsTo('App\Car');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    //Validation
    public function validate($data){
        return Validator::make($data, [
            'text'     => 'required'
        ]);
    }
}

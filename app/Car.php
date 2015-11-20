<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function featured(){
    	return $this->hasOne('App\Featured');
    }


    //Validation
    public function validate($data){
        return Validator::make($data, [
            'title'     => 'required'
        ]);
    }
}

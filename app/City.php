<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public function cars(){
        return $this->hasMany('App\Car');
    }

    //Validation
    public function validate($data){
        return Validator::make($data, [
            'name'     => 'required'
        ]);
    }
}

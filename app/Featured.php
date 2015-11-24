<?php

namespace App;

use Validator;
use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    protected $table = 'featured';

    public function car(){
        return $this->belongsTo('App\Car');
    }

    //Validation
    public function validate($data){
        return Validator::make($data, [

        ]);
    }
}

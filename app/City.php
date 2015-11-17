<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    //Validation
    public function validate($data){
        return Validator::make($data, [
            'name'     => 'required'
        ]);
    }
}

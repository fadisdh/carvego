<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'cars';

    //Validation
    public function validate($data){
        return Validator::make($data, [
            'title'     => 'required'
        ]);
    }
}

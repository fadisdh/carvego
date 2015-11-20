<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table = 'options';

    //Validation
    public function validate($data){
        return Validator::make($data, [
            'key'     => 'required'
        ]);
    }
}

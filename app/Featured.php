<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    protected $table = 'featured';

    //Validation
    public function validate($data){
        return Validator::make($data, [
        	
        ]);
    }
}

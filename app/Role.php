<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    //Validation
    public function validate($data){
        return Validator::make($data, [
            'name'     => 'required'
        ]);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';

    //Validation
    public function validate($data){
        return Validator::make($data, [
            'title'     => 'required'
        ]);
    }
}

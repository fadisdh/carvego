<?php

namespace App;

use Validator;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function name(){
        return "$this->firstname $this->lastname";
    }

    //Validation
    public function validate($data){
        if($data['admin']){
            return $this->validateSystemUser($data);
        }else{
            return $this->validateUser($data);
        }
    }

    public function validateUser($data){
        return Validator::make($data, [
            'firstname'     => 'required|min:3',
            'lastname'      => 'min:3',
            'password'      => ($this->id ? '' : 'required|') . 'confirmed|min:8',
            'email'         => 'required|email|unique:users' . ($this->id ? ",id,$this->id" : '')
        ]);
    }

    public function validateSystemUser($data){
        return Validator::make($data, [
            'firstname'     => 'required|min:3',
            'lastname'      => 'min:3',
            'password'      => ($this->id ? '' : 'required|') . 'confirmed|min:8',
            'email'         => 'required|email|unique:users' . ($this->id ? ",id,$this->id" : '')
        ]);
    }
}
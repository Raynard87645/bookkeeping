<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'userName', 'dob',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //set the attribute of the user name
    public function setNameAttribute($value){
        //Take user name and change the first letter to uppercase
        $this->attributes['name'] = ucfirst($value);
    }
    //set the attribute of the user password
    public function setPasswordAttribute($value){
        // take user password and encrypt the value
        $this->attributes['password'] = bcrypt($value);
    }

    //Accessors get and set functions
    //get name attributes
    public function getNameAttribute($value){
        //return the user name
        return  $value;  
    }
    //get email attributes
    public function getEmailAttribute($value){
        //remove @gmail.com from email
        return strtok($value, '@');
    }
}

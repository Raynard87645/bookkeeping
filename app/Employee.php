<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
      'first_name', 'last_name', 'address_street', 'address_town', 'address_parish', 'address_country', 'dob', 'email', 'ssn', 'hire_date', 'work_location', 'wages', 'wages_amount', 'vacation','effective_date', 'vacation_balance','vacation_type', 'vacation_rate', 'vacation_date',
    ];

     public function setUserIdAttribute($value){
        //Take user name and change the first letter to uppercase
        $this->attributes['first_name'] = ucfirst($value);
    }

}
 
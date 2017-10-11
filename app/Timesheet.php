<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timesheet extends Model
{
   protected $fillable = [
      'employees_id', 'regular', 'overtime', 'vacation', 'sick_time', 'total'
    ];
}

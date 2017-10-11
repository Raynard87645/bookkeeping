<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\User;
use Carbon\Carbon;


class Sales extends Model
{
    
    protected $fillable = [
      'user_id', 'item_id', 'customer_id', 
    ];

          
}
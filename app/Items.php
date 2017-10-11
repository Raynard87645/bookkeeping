<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
     protected $fillable = [
      'item_name', 'item_amount', 'item_short_code',
    ];

}

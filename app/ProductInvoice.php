<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductInvoice extends Model
{
   protected $fillable = [ 
     'product_total', 'quantity', 'price', 'name', 'invoice_id' 
     
    ];

    public function products(){
    	return $this->hasMany(Invoice::class);
    }
}

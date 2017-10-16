<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [ 
     'invoice_number', 'client', 'client_address', 'title', 'invoice_date', 'due_date',
     'sub_total', 'discount', 'grand_total'
     
    ];

    public function products(){
    	return $this->hasMany(ProductInvoice::class);
    }
}

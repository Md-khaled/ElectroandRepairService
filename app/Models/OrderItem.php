<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded=[];
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
   
    public function orders()
    {
    	return $this->belongsTo(Order::class);
    }
}

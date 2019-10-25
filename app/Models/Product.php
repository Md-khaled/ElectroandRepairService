<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded=[];
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    public function brand()
    {
    	return $this->belongsTo(Brand::class);
    }
    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function wishlist()
    {
        return $this->hasMany(WishList::class);
       // return $this->belongsTo(WishList::class);
    }
     
}

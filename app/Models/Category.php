<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded=[];
     public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}

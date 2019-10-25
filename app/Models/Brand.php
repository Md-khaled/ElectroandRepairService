<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $guarded=[];
    public function categories()
    {
    	return $this->hasMany(Category::class);
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

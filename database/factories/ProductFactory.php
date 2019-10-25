<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id'=>function(){
    		return User::all()->random()->id;	
    	},
    	'brand_id'=>function(){
    		return Brand::all()->random()->id;	
    	},
    	'category_id' => function(){
    		return Category::all()->random()->id;	
    	},
    	'title'=>$faker->text(50),
    	'img'=>'storage/app/public/admin_img/ProductImg/freez.jpg',
    	'content' => $faker->text(1000),
        'price'=>random_int(100, 5000),
    	'sale_price'=>random_int(100, 5000),
    ];
});

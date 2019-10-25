<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Brand;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Brand::class, function (Faker $faker) {
    return [
    	'user_id'=>function(){
    		return User::all()->random()->id;
    	},
        'name' =>  $faker->randomElement([
                    'Walton',
                    'LG',
                    'MyOne',
                    'Minister',
                    'Singer',
                ]),
        'logo' => 'https://placeimg.com/100/100/any?' . rand(1, 10),
        'url' => $faker->url,

    ];
});

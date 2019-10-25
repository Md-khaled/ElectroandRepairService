<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'user_id'=>function(){
            return User::all()->random()->id;
        },
        'name' =>  $faker->randomElement([
                    'TV',
                    'Freez',
                    'Fan',
                    'Computer',
                    'AC',
                    'Iron',
                    'Camera',
                ]),
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
         'role_id'=>function(){
    		return Role::all()->random()->id;
    		//return App\User::first()->id ?: factory(App\User::class)->create()->id;	
    	},
        'email' =>$faker->randomElement([
                     
                     $faker->unique()->safeEmail,
                ]),

        'mobile' => $faker->phoneNumber,
        'code' => $faker->ean8,
        'email_verified' => 1,
        'email_verification_token' => '',
        'image' => $faker->imageUrl(),
        'email_verified_at' => \Carbon\Carbon::now(),
        'password' => bcrypt('12345678'),
        'remember_token' => Str::random(10),
    ];
});

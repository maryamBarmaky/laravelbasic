<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' =>bcrypt(str_random(10)),
        'verified'=>TRUE,
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Banner::class, function (Faker\Generator $faker) {


    return [
        'user_id'=>factory('App\User')->create()->id,
        'street' => $faker->streetAddress,
        'city' => $faker->city,
        'zip' =>$faker->postcode,
        'state' =>$faker->state,
        'country' =>$faker->country,
        'price'=>$faker->numberBetween(10000,50000),
        'description'=>$faker->paragraphs(3,TRUE)
    ];
});

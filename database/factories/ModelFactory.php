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

$factory->define(shortener\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(shortener\Url::class, function (Faker\Generator $faker) {
    return [
        'id' => random_int(1, 999999999),
        'created_at' => '2016-05-19 05:22:28',
        'updated_at' => '2016-05-19 05:22:28',
        'long_url' => str_random(100),
    ];
});

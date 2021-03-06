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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'title' => $faker->title,
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = 'password',
        'dob' => $faker->date,
        'gender' => array_rand(['male', 'female']),
        'api_token' => str_random(60),
        'remember_token' => str_random(10),
    ];
});

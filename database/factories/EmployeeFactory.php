<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Employee::class, function (Faker $faker) {
    return [
        'firstName'=> $faker->firstName,
        'lastName' => $faker->lastName,
        'email'    => $faker->unique()->email,
        'phone'    => $faker->phoneNumber,
    ];
});

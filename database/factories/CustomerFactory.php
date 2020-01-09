<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstNameMale,
        'last_name' => $faker->lastName,
        'date_of_birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'user_id' => $faker->numberBetween($min = 1000, $max = 9000),
    ];
});

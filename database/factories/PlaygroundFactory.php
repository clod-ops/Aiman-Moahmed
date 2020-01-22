<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Playground;
use Faker\Generator as Faker;

$factory->define(Playground::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->city,
        'location' => $faker->country,
        'size' => $faker->numberBetween($min = 1, $max = 9999),
        'capacity' => $faker->numberBetween($min = 1, $max = 999), 
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'playground_id' => $faker->numberBetween($min = 1, $max = 5),
        'start_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'finish_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'start_time' => $faker->time($format = 'H:i:s', $max = 'now'),
        'finish_time' => $faker->time($format = 'H:i:s', $max = 'now'),
    ];
});

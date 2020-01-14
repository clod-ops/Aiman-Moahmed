<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 5),
        'playground_id' => $faker->numberBetween($min = 1, $max = 5),
        'start_date_time' => $faker->dateTime($max = 'now', $timezone = null),
        'finish_date_time' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});

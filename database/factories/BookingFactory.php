<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Booking;
use Faker\Generator as Faker;

$factory->define(Booking::class, function (Faker $faker) {
    return [
        'time' => $faker->dateTime($max = 'now', $timezone = null),
        'user_id' => 1,
        'playground_id' => $faker->numberBetween($min = 0, $max = 5),
    ];
});

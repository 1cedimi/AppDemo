<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Chart;
use Faker\Generator as Faker;

$factory->define(App\Dataset::class, function (Faker $faker) {
    return [
      'chart_id' => function() { return Chart::all()->random(); },
      'date' => $faker->unique()->date,
      'temperature' => $faker->numberBetween(-20, 40),
      'air_infection' => $faker->numberBetween(0, 100),
    ];
});
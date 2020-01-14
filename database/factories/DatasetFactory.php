<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Dataset::class, function (Faker $faker) {
    return [
      /* 'chart_id' => function() { return \App\Chart::all()->random(); }, */
      'date' => $faker->unique()->date,
      'temperature' => $faker->numberBetween(15, 25),
      'air_infection' => $faker->numberBetween(10, 25),
    ];
});

$factory->state(\App\Dataset::class, 'warning', function (Faker $faker) {
  return [
    /* 'chart_id' => function() { return \App\Chart::all()->random(); }, */
    'date' => $faker->unique()->date,
    'temperature' => $faker->numberBetween(15, 25),
    'air_infection' => $faker->numberBetween(10, 24),
  ];
});

$factory->state(\App\Dataset::class, 'safe', function (Faker $faker) {
  return [
    /* 'chart_id' => function() { return \App\Chart::all()->random(); }, */
    'date' => $faker->unique()->date,
    'temperature' => $faker->numberBetween(15, 25),
    'air_infection' => $faker->numberBetween(10, 14),
  ];
});
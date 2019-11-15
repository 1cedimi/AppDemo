<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Chart::class, function (Faker $faker) {
    return [
      'name' => $faker->city,
      'description' => $faker->sentence(50),
    ];
});
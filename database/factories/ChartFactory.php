<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Chart::class, function (Faker $faker) {
    $city = (string)$faker->city;
    $city = substr($city,0,18); // max title is 18 characters

    return [
      'name' => $city,
      'creator_id' => NULL,
      'description' => $faker->sentence($faker->numberBetween(30,50)),
      'active' => '1'
    ];
});
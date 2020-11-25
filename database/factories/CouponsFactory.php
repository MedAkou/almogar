<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Coupons;
use Faker\Generator as Faker;

$factory->define(Coupons::class, function (Faker $faker) {
    return [
        'code' => $faker->uuid,
        'valid_from' =>  $faker->dateTime($max = 'now'),
        'valid_to' => $faker->dateTime($min = 'now'),
        'discount_type' => $faker->randomElement(['percent', 'fixed']),
        'discount' => $faker->numberBetween($min = 1, $max = 100),
        'logged' => $faker->randomElement(['active', 'inactive']),
        'shipping' => $faker->randomElement(['active', 'inactive']),
        'description' => $faker->text,
        'count' => $faker->numberBetween($min = 1, $max = 100),
        'title' => $faker->text,
        'statue' => $faker->randomElement(['active', 'inactive'])
    ];
});

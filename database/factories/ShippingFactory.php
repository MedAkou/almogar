<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Shipping;
use App\Models\Stores;
use Faker\Generator as Faker;

$factory->define(Shipping::class, function (Faker $faker) {
    $stores_id = Stores::get('id');
    return [
        'name' => $faker->name,
        'delivery_days' => $faker->numberBetween($min = 1, $max = 30),
        'statue' => $faker->randomElement(['Shipped', 'pending']),
        'cost' => $faker->numberBetween($min = 0, $max = 999),
        'lang' => $faker->randomElement(['en', 'fr', 'ar']),
        'store_id' => $faker->randomElement($stores_id)
    ];
});

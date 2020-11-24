<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Ads;
use App\Models\Stores;
use Faker\Generator as Faker;

$factory->define(Ads::class, function (Faker $faker) {
    $stores_id = Stores::get('id');
    return [
        'statue' => $faker->randomElement(['active', 'inactive']),
        'name' => $faker->name,
        'url' => $faker->url,
        'image' => '/images/'.$faker->userName,
        'htmlcode' => $faker->text,
        'date_start' => $faker->dateTime($max = 'now'),
        'date_end' => $faker->dateTime($min = 'now'),
        'store_id' => $faker->randomElement($stores_id),
        'lang' => $faker->randomElement(['en', 'fr', 'ar'])
    ];
});

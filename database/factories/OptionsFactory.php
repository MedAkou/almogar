<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Options;
use App\Models\Stores;
use Faker\Generator as Faker;

$factory->define(Options::class, function (Faker $faker) {
    $stores_id = Stores::get('id');
    return [
        'key' => $faker->randomElement(['logo', 'sitename', 'tagline', 'email']),
        'value' => '/media/'.$faker->uuid.'.jpeg',
        'store_id' => $faker->randomElement($stores_id),
        'lang' => $faker->randomElement(['en', 'fr', 'ar'])
    ];
});

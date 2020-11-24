<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AdsManager;
use Faker\Generator as Faker;

$factory->define(AdsManager::class, function (Faker $faker) {
    return [
        'statue' => $faker->randomElement(['active', 'inactive']),
        'name' => $faker->text,
        'url' => $faker->url,
        'image' => '/images/'.$faker->uuid.'.jpeg',
        'htmlcode' => $faker->text,
        'area' => $faker->randomElement(['under_stores', 'under_slider']),
        'lang' => $faker->randomElement(['en', 'fr', 'ar'])
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\HomeSlider;
use Faker\Generator as Faker;

$factory->define(HomeSlider::class, function (Faker $faker) {
    return [
        'image' => '/sliders/'.$faker->uuid.'.jpeg',
        'link' => $faker->url,
        'lang' => $faker->randomElement(['en', 'fr', 'ar'])
    ];
});

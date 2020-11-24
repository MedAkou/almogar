<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Slider;
use App\Models\Stores;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    $stores_id = Stores::get('id');
    return [
        'image' => 'sliders/'.$faker->uuid.'.jpg',
		'link' => $faker->url,
		'lang' => $faker->randomElement(['en', 'fr', 'ar']),
        'store_id' => $faker->randomElement($stores_id)
    ];
});

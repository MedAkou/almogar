<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\ProductCategories;
use App\Models\Stores;
use Faker\Generator as Faker;

$factory->define(ProductCategories::class, function (Faker $faker) {
    $stores_id = Stores::get('id');
    return [
        'name' => $faker->name,
		'slug' => $faker->slug,
		'image' => 'products/'.$faker->uuid.'.jpg',
		'lang' => $faker->randomElement(['en', 'fr', 'ar']),
		'store_id' => $faker->randomElement($stores_id)
    ];
});

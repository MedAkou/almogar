<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Page;
use App\Models\Stores;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    $stores_id = Stores::get('id');
    return [
        'title' => $faker->text,
        'content' => $faker->text,
        'slug' => $faker->slug,
        'lang' => $faker->randomElement(['en', 'fr', 'ar']),
        'store_id' => $faker->randomElement($stores_id)
    ];
});

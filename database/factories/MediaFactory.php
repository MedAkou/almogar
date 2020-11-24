<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Media;
use App\Models\Stores;
use Faker\Generator as Faker;

$factory->define(Media::class, function (Faker $faker) {
    $stores_id = Stores::get('id');
    return [
        'name' => $faker->text,
        'post_mime_type' => $faker->mimeType,
        'size' => $faker->numberBetween($min = 1, $max = 100),
        'store_id' => $faker->randomElement($stores_id)
    ];
});

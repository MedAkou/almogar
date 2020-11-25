<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FaqsCategory;
use Faker\Generator as Faker;

$factory->define(FaqsCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->text,
        'slug' => $faker->slug
    ];
});

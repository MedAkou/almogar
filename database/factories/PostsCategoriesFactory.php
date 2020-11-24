<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PostsCategory;
use Faker\Generator as Faker;

$factory->define(PostsCategory::class, function (Faker $faker) {
    return [
        'name' => $faker->text,
        'slug' => $faker->slug
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\ProductReview;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(ProductReview::class, function (Faker $faker) {
    $users_id = User::get('id');
    $products_id = Product::get('id');
    return [
        'user_id' => $faker->randomElement($users_id),
        'rating' => $faker->numberBetween($min = 1, $max = 100),
        'title' => $faker->text,
        'productID' => $faker->randomElement($products_id),
        'review' => $faker->text
    ];
});

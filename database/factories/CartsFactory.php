<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Cart;
use App\Models\Product;
use App\Models\Stores;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    $users_id = User::get('id');
    $stores_id = Stores::get('id');
    $products_id = Product::get('id');
    return [
        'user_id' => $faker->randomElement($users_id),
        'store_id' => $faker->randomElement($stores_id),
        'product_id' => $faker->randomElement($products_id),
        'quantity' => $faker->numberBetween($min = 1, $max = 100),
        'price' => $faker->numberBetween($min = 1, $max = 999),
        'subtotal' => $faker->numberBetween($min = 1, $max = 999)
    ];
});

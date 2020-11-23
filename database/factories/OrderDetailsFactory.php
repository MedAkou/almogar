<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(OrderDetails::class, function (Faker $faker) {
    $orders_id = Orders::get('id');
    $products_id = Product::get('id');
    return [
        'order_id' => $faker->randomElement($orders_id),
        'product_id' => $faker->randomElement($products_id),
        'quantity' => $faker->numberBetween($min = 1, $max = 100),
        'price' => $faker->numberBetween($min = 1, $max = 999)
    ];
});

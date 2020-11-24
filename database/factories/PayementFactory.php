<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Orders;
use App\Models\Payement;
use Faker\Generator as Faker;

$factory->define(Payement::class, function (Faker $faker) {
    $orders_id = Orders::get('id');
    return [
        'order_id' => $faker->randomElement($orders_id),
        'method' => $faker->randomElement(['VISA', 'Paypal', 'Cash']),
        'transactionID' => $faker->isbn13
    ];
});

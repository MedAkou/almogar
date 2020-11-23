<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Addresses;
use App\Models\Orders;
use App\Models\Payement;
use App\Models\Shipping;
use App\Models\Stores;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Orders::class, function (Faker $faker) {
    $users_id = User::get('id');
    $addresses_id = Addresses::get('id');
    $stores_id = Stores::get('id');
    $shippings_id = Shipping::get('id');
    $payements_id = Payement::get('id');

    return [
        'statue' => $faker->randomElement(['pending', 'delivered']),
        'user_id' => $faker->randomElement($users_id),
        'address_id' => $faker->randomElement($addresses_id),
        'total' => $faker->numberBetween($min = 0, $max = 999),
        'store_id' => $faker->randomElement($stores_id),
        'shipping_id' => $faker->randomElement($shippings_id),
        'currency' => $faker->randomElement(['USD', 'MAD']),
        'payement_id' => $faker->randomElement($payements_id),
        'subtotal' => $faker->numberBetween($min = 0, $max = 999),
        'pickup' => $faker->randomElement(['pickup']),
        'serial' => 'O-Bazaar'.$faker->ean8,
        'device' => $faker->randomElement(['phone', 'desktop']),
        'ip' => $faker->numberBetween($min = 0, $max = 255),
        'country' => $faker->randomElement(['Morocco', 'UK', 'USA']),
        'platform' => $faker->randomElement(['Windows', 'Android', 'IOS']),
    ];
});

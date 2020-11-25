<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Stores;
use App\Models\User;
use App\Models\WishList;
use Faker\Generator as Faker;

$factory->define(WishList::class, function (Faker $faker) {
    $users_id = User::get('id');
    $stores_id = Stores::get('id');
    $products_id = Product::get('id');
    return [
        'user_id' =>$faker->randomElement($users_id),
		'lang' => $faker->randomElement(['en', 'fr', 'ar']),
		'store_id' => $faker->randomElement($stores_id),
		'productID' =>$faker->randomElement($products_id)
    ];
});

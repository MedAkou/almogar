<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Addresses;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Addresses::class, function (Faker $faker) {
    $users_id = User::get('id');
    return [
        'given_name' => $faker->name,
        'country_code' => $faker->countryCode,
        'street' => $faker->streetName,
        'housenumber' => $faker->buildingNumber,
        'state' => $faker->state,
        'city' => $faker->city,
        'postal_code' => $faker->postcode,
        'latitude' => $faker->latitude($min = -90, $max = 90),
        'longitude' => $faker->longitude($min = -180, $max = 180),
        'phone' => $faker->phoneNumber,
        'user_id' => $faker->randomElement($users_id),
        'is_primary' => $faker->randomElement([0, 1]),
        'is_billing' => $faker->randomElement([0, 1]),
        'is_shipping' => $faker->randomElement([0, 1])
    ];
});

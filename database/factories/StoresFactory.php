<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use App\Models\Stores;
use Faker\Generator as Faker;

$factory->define(Stores::class, function (Faker $faker) {
    $users_id = User::get('id');
    return [
        'name' => $faker->name,
        'street' => $faker->streetName,
        'description' => $faker->text,
        'logo' => 'logos/'.$faker->uuid.'.jpg',
        'thumbnail' => 'stores/'.$faker->uuid.'.jpg',
        'user_id' => $faker->randomElement($users_id),
        'postal_code' => $faker->postcode,
        'slug' => $faker->slug,
        'latitude' => $faker->latitude($min = -90, $max = 90),
        'longitude' => $faker->longitude($min = -180, $max = 180),
    ];
});

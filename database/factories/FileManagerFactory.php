<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\FileManager;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(FileManager::class, function (Faker $faker) {
    $users_id = User::get('id');
    return [
        'name' => $faker->name,
        'ext' => $faker->randomElement(['jpg', 'png']),
        'file_size' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 999),
        'user_id' => $faker->randomElement($users_id),
        'absolute_url' => $faker->url
    ];
});

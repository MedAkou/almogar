<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Stores;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $stores_id = Stores::get('id');
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'remember_token' => Str::random(10),
        'avatar' => '/avatars/'.$faker->userName,
		'description' => $faker->text,
		'role' => $faker->randomElement(['manager', 'merchant', 'user']),
		'phone' => $faker->phoneNumber,
		'country' => $faker->country,
		'device' => $faker->randomElement(['phone', 'desktop']),
		'browser' => $faker->randomElement(['Chrome', 'Mozilla', 'Edge', 'Opera', 'Safari']),
		'ip' => $faker->localIpv4,
		'gender' => $faker->randomElement(['male', 'female']),
		'statue' => $faker->randomElement(['active', 'blocked']),
		'store_id' => $faker->randomElement($stores_id),
		'os' => $faker->randomElement(['Windows', 'IOS', 'Android']),
		'last_login' => now(),
		'device_token' => $faker->sha256
    ];
});

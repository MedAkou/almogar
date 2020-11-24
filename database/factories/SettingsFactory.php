<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Setting;
use Faker\Generator as Faker;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'key' => $faker->randomElement(['sitename', 'tagline', 'Timezone']),
        'value' => $faker->randomElement(['O-bazaar', 'best online shop in germany', 'Africa/Abidjan']),
        'lang' => $faker->randomElement(['en', 'fr', 'ar']),
    ];
});

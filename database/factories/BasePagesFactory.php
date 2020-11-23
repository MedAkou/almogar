<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\BasePages;
use App\Models\Stores;
use Faker\Generator as Faker;

$factory->define(BasePages::class, function (Faker $faker) {
    $stores_id = Stores::get('id');
    return [
        'title' => $faker->randomElement(['Privacy', 'Policy', 'About us', 'Contact us']),
        'content' => '  <p>
                            <strong>Lorem Ipsum</strong>
                            &nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                        </p>',
        'slug' => $faker->slug,
        'lang' => $faker->randomElement(['en', 'fr', 'ar']),
        'store_id' => $faker->randomElement($stores_id)
    ];
});

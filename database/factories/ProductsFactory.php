<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\Stores;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $stores_id = Stores::get('id');
    $productCategories_id = ProductCategories::get('id');
    return [
        'name' => '{"ar":"\u0628\u0627\u0630\u0646\u062c\u0627\u0646 \u0645\u062c\u0641\u0641 50 \u063a\u0631\u0627\u0645","de":"Getrocknete Auberginen 50 g","tr":"Kuru patl\u0131can 50 g"}',
        'thumbnail' => $faker->url,
        'gallery' => $faker->url,
        'price' => $faker->numberBetween($min = 1, $max = 999),
        'description' => $faker->text,
        'categoryID' => $faker->randomElement($productCategories_id),
        'slug' => $faker->slug,
        'lang' => $faker->randomElement(['en', 'fr', 'ar']),
        'store_id' => $faker->randomElement($stores_id),
        'size' => $faker->numberBetween($min = 1, $max = 999),
        'weight' => $faker->numberBetween($min = 1, $max = 999),
        'quantity' => $faker->numberBetween($min = 1, $max = 999),
        'discount' => $faker->numberBetween($min = 0, $max = 100),
        'height' => $faker->numberBetween($min = 1, $max = 999),
        'length' => $faker->numberBetween($min = 1, $max = 999),
        'width' => $faker->numberBetween($min = 1, $max = 999),
        'active' => $faker->randomElement([0, 1])
    ];
});

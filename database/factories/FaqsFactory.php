<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Faq;
use App\Models\FaqsCategory;
use Faker\Generator as Faker;

$factory->define(Faq::class, function (Faker $faker) {
    $faqsCategories_id = FaqsCategory::get('id');
    return [
        'question' => $faker->text,
        'answer' => $faker->text,
        'category' => $faker->randomElement($faqsCategories_id)
    ];
});

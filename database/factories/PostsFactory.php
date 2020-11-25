<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use App\Models\PostsCategory;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $postscategories_id = PostsCategory::get('id');
    return [
        'author' => $faker->name,
        'title' => $faker->text,
        'content' => $faker->text,
        'thumbnail' => 'posts/'.$faker->uuid.'.jpg',
        'comments_enabled' => $faker->randomElement([0, 1]),
        'slug' => $faker->slug,
        'categoryID' => $faker->randomElement($postscategories_id)
    ];
});

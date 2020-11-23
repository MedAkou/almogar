<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $users_id = User::get('id');
    $posts_id = Post::get('id');
    return [
        'user_id' => $faker->randomElement($users_id),
        'post_id' => $faker->randomElement($posts_id),
        'author' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'content' => $faker->text,
        'approved' => $faker->randomElement(['0', '1'])
    ];
});

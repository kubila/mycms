<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'category_id' => function () {
            return Category::all()->random();
        },
        'author_id' => function () {
            return Author::all()->random();
        },
        'title' => $faker->title(),
        'image' => $faker->image('public/storage/images', 2048, 1360, 'cats', true, true, 'faker'),
        'content' => $faker->paragraphs(10, true),
        'description' => $faker->sentence(2, true),

    ];
});

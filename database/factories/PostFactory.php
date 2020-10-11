<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Author;
use App\Models\Category;
use App\Models\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;

$factory->define(Post::class, function (Faker $faker) {
    $file = Storage::disk('public')->allFiles('images');

    return [
        'category_id' => function () {
            return Category::all()->random();
        },
        'author_id' => function () {
            return Author::all()->random();
        },
        'title' => $faker->words(3, true),
        'image' => $faker->randomElement($file), //$faker->image('images', 2048, 1360, 'cats', true, true, 'faker'),
        'content' => $faker->paragraphs(10, true),
        'description' => $faker->sentence(2, true),

    ];
});

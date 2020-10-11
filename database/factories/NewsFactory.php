<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraph(1, true),
        'url' => $faker->url(),
        'content' => $faker->paragraphs(3, true),
        'is_published' => $faker->boolean(50),
    ];
});

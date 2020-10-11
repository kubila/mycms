<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tags;
use Faker\Generator as Faker;

$factory->define(Tags::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
    ];
});

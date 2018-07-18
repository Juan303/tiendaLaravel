<?php

use Faker\Generator as Faker;
use App\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [

    'name' => ucfirst($faker->word),
    'image' => $faker->imageUrl(600, 250),
    'description' => $faker->sentence(10)

    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title'     => $faker->sentence(),
        'category_id'   => rand(1,4),
        'slug'      => \Str::slug($faker->sentence()),
        'body'      => $faker->text()
    ];
});

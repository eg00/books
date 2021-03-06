<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, static function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'price' => $faker->numberBetween(500, 2000),
        'published' => $faker->dateTimeBetween('-2 years', '-2 weeks'),
    ];
});

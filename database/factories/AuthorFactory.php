<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, static fn(Faker $faker) => ['full_name' => $faker->name()]);

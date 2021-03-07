<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\LembagaPkbm::class, function (Faker $faker) {
    return [
        'pkbm' => $faker->word,
        'npsn' => $faker->word,
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\PaketUjian::class, function (Faker $faker) {
    return [
        'nama' => $faker->word,
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\RapotUser::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'mapel_id' => factory(App\Mapel::class),
        'nilai' => $faker->randomFloat(),
    ];
});

<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\JawabanUser::class, function (Faker $faker) {
    return [
        'user_id' => factory(App\User::class),
        'soal_pg_id' => factory(App\SoalPg::class),
        'soal_essai_id' => factory(App\SoalEssai::class),
        'jawaban' => $faker->text,
    ];
});

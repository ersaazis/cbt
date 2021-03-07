<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\SoalEssai::class, function (Faker $faker) {
    return [
        'soal' => $faker->word,
        'gambar' => $faker->word,
        'video' => $faker->word,
        'paket_ujian_id' => factory(App\PaketUjian::class),
        'mapel_id' => factory(App\Mapel::class),
    ];
});

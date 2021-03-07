<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\SoalPg::class, function (Faker $faker) {
    return [
        'soal' => $faker->word,
        'gambar' => $faker->word,
        'video' => $faker->word,
        'jawaban' => $faker->text,
        'tipe_jawaban' => $faker->text,
        'pilihan_a' => $faker->word,
        'pilihan_b' => $faker->word,
        'pilihan_c' => $faker->word,
        'pilihan_d' => $faker->word,
        'paket_ujian_id' => factory(App\PaketUjian::class),
        'mapel_id' => factory(App\Mapel::class),
    ];
});

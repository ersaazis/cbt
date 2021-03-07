<?php

use Illuminate\Database\Seeder;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PaketUjian::whereNotNull('id')->delete();
        \App\PaketUjian::insert([
            [
                'id'=>1,
                'nama'=>'Paket A'
            ],
            [
                'id'=>2,
                'nama'=>'Paket B'
            ],
            [
                'id'=>3,
                'nama'=>'Paket C'
            ]
        ]);
        \App\LembagaPkbm::whereNotNull('id')->delete();
        \App\LembagaPkbm::insert([
            [
                'id'=>1,
                'pkbm'=>'Lembaga 1',
                'npsn'=>'11111',
            ],
            [
                'id'=>2,
                'pkbm'=>'Lembaga 2',
                'npsn'=>'22222',
            ],
            [
                'id'=>3,
                'pkbm'=>'Lembaga 3',
                'npsn'=>'33333',
            ],
            [
                'id'=>4,
                'pkbm'=>'Lembaga 4',
                'npsn'=>'44444',
            ],
            [
                'id'=>5,
                'pkbm'=>'Lembaga 5',
                'npsn'=>'55555',
            ],
        ]);
        \App\Mapel::whereNotNull('id')->delete();
        \App\Mapel::insert([
            [
                'id'=>1,
                'nama'=>'Matematika'
            ],
            [
                'id'=>2,
                'nama'=>'Bahasa Indonesia'
            ],
            [
                'id'=>3,
                'nama'=>'Fisika'
            ]
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class BaseDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}

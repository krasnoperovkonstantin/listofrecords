<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 500; $i++)
            DB::table('Records')->insert([
                'subgenre_id' => mt_rand(1, 50),
                'format_id' => mt_rand(1, 10),
                'origin_id' => mt_rand(1, 20),
                'manufacturer_id' => mt_rand(1, 50),
                'title' => 'Пластинка '.$i,
                'description' => 'Описание пластинки '.$i,
                'release_date' => date("Y-m-d", mt_rand(0, 1624076344)),
                'part_number' => mt_rand(100000, 999999).$i,
                'slug' => 'record-'.$i,
            ]);
    }
}

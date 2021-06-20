<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OriginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++)
            DB::table('Origins')->insert([
                'title' => 'Происхождение '.$i,
                'slug' => 'origin-'.$i,
            ]);
    }
}
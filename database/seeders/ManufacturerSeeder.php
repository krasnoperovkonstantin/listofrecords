<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 50; $i++)
            DB::table('Manufacturers')->insert([
                'title' => 'Производитель '.$i,
                'slug' => 'manufacturer-'.$i,
            ]);
    }
}

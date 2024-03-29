<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GenreSeeder::class,
            FormatSeeder::class,
            OriginSeeder::class,
            ManufacturerSeeder::class,
            RecordSeeder::Class,
            TrackSeeder::Class,
        ]);
    }
}

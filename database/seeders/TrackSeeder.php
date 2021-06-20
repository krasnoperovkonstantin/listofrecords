<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($record_id = 0; $record_id < 500; $record_id++)
        {
            $quantity=mt_rand(1, 20);
            for ($track = 0; $track < $quantity; $track++)
                DB::table('tracks')->insert([
                    'records_id' => mt_rand(1, 500),
                    'time' => mt_rand(1, 10),
                    'number' => $track,
                    'title' => 'Трек '.$track.' пластинки '.$record_id,
                    'slug' => 'track-'.$record_id.'-'.$track,
                ]);
        }
    }
}

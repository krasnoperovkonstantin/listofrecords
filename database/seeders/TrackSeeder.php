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
        for ($record_id = 1; $record_id <= 500; $record_id++)
        {
            $quantity=mt_rand(1, 20);
            for ($track = 1; $track < $quantity; $track++)
                DB::table('tracks')->insert([
                    'record_id' => $record_id,
                    'duration' => '00:' . mt_rand(0, 9 ) . ':' . mt_rand(1, 59),
                    'number' => $track,
                    'title' => "Трек $track пластинки $record_id",
                ]);
        }
    }
}

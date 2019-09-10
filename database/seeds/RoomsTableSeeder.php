<?php

use Illuminate\Database\Seeder;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'room_size' => rand(100, 1000),
            'room_description' => Str::random(100),
            'room_price' => rand(10, 1000),
            'room_status' => (bool)rand(0,2),
        ]);
    }
}

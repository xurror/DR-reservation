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
        $status = ['Free', 'Reserved/Unoccupied', 'Reserved/Occupied'];
        DB::table('rooms')->insert([
            'size' => rand(100, 1000),
            'description' => Str::random(100),
            'price' => rand(10, 1000),
            'status' => $status[array_rand($status)],
        ]);
    }
}

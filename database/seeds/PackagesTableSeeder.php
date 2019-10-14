<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 20; $i++){
            $status = ['Free', 'Reserved/Unoccupied', 'Reserved/Occupied'];
            DB::table('packages')->insert([
                'size' => rand(100, 1000),
                'description' => Str::random(100),
                'price' => rand(10, 1000),
                'status' => $status[array_rand($status)],
            ]);
        }
    }
}

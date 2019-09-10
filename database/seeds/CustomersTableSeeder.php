<?php

use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'SSN' => Str::random(10),
            'age' => rand(5, 40),
            'date_of_birth' => new DateTime(),
            'occupation' => Str::random(10),
            'current_address' => str::random(10),
            'telephone' => rand(1000000, 10000000),
            'email' => Str::random(10).'@gmail.com',
        ]);
    }
}

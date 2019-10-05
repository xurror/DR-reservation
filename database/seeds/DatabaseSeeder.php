<?php

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

        $this->call(CustomersTableSeeder::class);
        $this->call(RoomsTableSeeder::class);
        $this->call(PaymentsTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);

    }
}

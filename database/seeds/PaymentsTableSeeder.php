<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservation_ids = DB::table('reservations')->pluck('id')->toArray();
        
        DB::table('payments')->insert([
            'reservation_id' => $reservation_ids[array_rand($reservation_ids)],
            'amount' => rand(0,1000),
            'payment_date' => new DateTime(),
        ]);
    }
}

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
        $methods = ['MoMo', 'Paypal', 'Cash'];

        $reservation_ids = DB::table('reservations')->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            DB::table('payments')->insert([
                'reservation_id' => $reservation_ids[array_rand($reservation_ids)],
                'amount' => rand(0, 1000),
                'method' => $methods[array_rand($methods)],
                'date' => new DateTime(),
            ]);
        }
    }
}

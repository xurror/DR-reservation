<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
    
            $year = rand(2009, 2020);
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year,$month ,$day , 0, 0, 0);
            
            DB::table('payments')->insert([
                'reservation_id' => $reservation_ids[array_rand($reservation_ids)],
                'amount' => rand(0, 1000),
                'method' => $methods[array_rand($methods)],
                'date' => $date->format('Y-m-d H:i:s'),
            ]);
        }
    }
}

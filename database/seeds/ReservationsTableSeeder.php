<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer_ids = DB::table('customers')->pluck('id')->toArray();
        $room_ids = DB::table('rooms')->pluck('id')->toArray();
        $payment_ids = DB::table('payments')->pluck('id')->toArray();

        $status = ['Reserved/Fully Paid', 'Reserved/Partially Paid'. 'Reserved/Not paid'];

        $year = rand(2009, 2016);
        $month = rand(1, 12);
        $day = rand(1, 28);

        $date = Carbon::create($year,$month ,$day , 0, 0, 0);

        DB::table('reservations')->insert([
            'customer_id' => $customer_ids[array_rand($customer_ids)],
            'room_id' => $room_ids[array_rand($room_ids)],
            'payment_id' => $payment_ids[array_rand($payment_ids)],
            'from' => $date->format('Y-m-d H:i:s'),
            'to' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
            'status' => $status[array_rand($status)],
            'No_of_rooms' => rand(1, 10),
        ]);
    }
}

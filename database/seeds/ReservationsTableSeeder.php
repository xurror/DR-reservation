<?php

use Illuminate\Database\Seeder;

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
        
        DB::table('reservations')->insert([
            'customer_id' => $customer_ids[array_rand($customer_ids)],
            'room_id' => $room_ids[array_rand($room_ids)],
            'reservation_date' => new DateTime(),
            'expiry_date' => new DateTime(),
            'status' => (bool)rand(0,2),
            'No_of_rooms' => rand(1, 10),
        ]);
    }
}

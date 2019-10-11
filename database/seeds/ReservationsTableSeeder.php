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
        $package_ids = DB::table('packages')->pluck('id')->toArray();

        $status = ['Reserved/Fully Paid', 'Reserved/Partially Paid', 'Reserved/Not paid'];        

        for ($i = 1; $i <= 20; $i++) {

            $year = rand(2009, 2016);
            $month = rand(1, 12);
            $day = rand(1, 28);

            $date = Carbon::create($year,$month ,$day , 0, 0, 0);
            
            DB::table('reservations')->insert([
                'customer_id' => $customer_ids[array_rand($customer_ids)],
                'package_id' => $package_ids[array_rand($package_ids)],
                'from' => $date->format('Y-m-d H:i:s'),
                'to' => $date->addWeeks(rand(1, 52))->format('Y-m-d H:i:s'),
                'status' => $status[array_rand($status)],
                'No_of_packages' => rand(1, 10),
            ]);
        }
    }
}

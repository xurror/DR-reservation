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

        for ($i = 0; $i <= 20; $i++) {
            DB::table('payments')->insert([
                'amount' => rand(0, 1000),
                'method' => $methods[array_rand($methods)],
                'date' => new DateTime(),
            ]);
        }
    }
}

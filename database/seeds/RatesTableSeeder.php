<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            [
                'pair' => "USD_ZAR",
                'rate' => "12.9677",
                'created_at' => Carbon::now(),            
                'updated_at' => Carbon::now()
            ],
            [
                'pair' => "ZAR_USD",
                'rate' => "0.07711468",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}

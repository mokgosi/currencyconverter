<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use Carbon\Carbon;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
   
        
//    	$client = new Client();
//    	$res = $client->request('GET', 'http://free.currencyconverterapi.com/api/v3/currencies');
//    	$currencies = json_decode($res->getBody());

//        foreach ($currencies->results as $values) {
//            array_push($inserts, [
//            	'name' =>$values->currencyName, 
//            	'code' =>$values->id, 
//            	'created_at' => Carbon::now(),
//        		'updated_at' => Carbon::now()]
//    		);
//        }
        DB::table('currencies')->insert([
            [
                'name' => "South African Rand",
                'code' => "ZAR",
                'usd_equivalent' => "13.034602",
                'created_at' => Carbon::now(),            
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "United States Dollar",
                'code' => "USD",
                'usd_equivalent' => "1",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}

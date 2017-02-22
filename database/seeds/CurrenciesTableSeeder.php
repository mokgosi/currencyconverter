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
                'name' => "Australian Dollar",
                'code' => "AUD",
                'usd_equivalent' => "1.300597",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "Euro",
                'code' => "EUR",
                'usd_equivalent' => "0.942195",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "British Pound Sterling",
                'code' => "GBP",
                'usd_equivalent' => "0.80223",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "Japanese Yen",
                'code' => "JPY",
                'usd_equivalent' => "113.105003",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "United States Dollar",
                'code' => "USD",
                'usd_equivalent' => "1",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "Bitcoin",
                'code' => "BTC",
                'usd_equivalent' => "0.000944",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use GuzzleHttp\Client;

use App\Currency;
use DB;

class WebController extends Controller
{

    public function index()
    {
        $currencies = Currency::select('code', DB::raw("concat(code, ' - ',name) as code_name"))
                ->pluck('code_name', 'code');

        return view('web.index',compact('currencies'));
    }

    public function convert(Request $request)
    {
        $client = new Client();
        $from = $request->input('convertFrom');
        $to = $request->input('convertTo');
        $query=$from.'_'.$to;

        $url = env('CURR_CONV_API_URL').'/convert?q='.$query.'&compact=y';
    	$results = $client->request('GET', $url);
    	$body = json_decode($results->getBody());
        $rate = $body->$query;

        activity()->log('Conversion request: '.$request->input('amount').':'.$query);

        $conversion = ($rate->val * $request->input('amount'));

        return new JsonResponse(compact('conversion'));
    }

}

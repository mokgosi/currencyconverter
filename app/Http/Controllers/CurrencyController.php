<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Session;

class CurrencyController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::paginate(10);
        return view('currency.index')->withCurrencies($currencies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'code' => 'required|max:3'
        ]);
        
        $currency = new Currency();
        $currency->name = $request->input('name');
        $currency->code = strtoupper($request->input('code'));
        $currency->usd_equivalent = $request->input('usd_equivalent');
        $currency->created_at = Carbon::now();
        $currency->updated_at = Carbon::now();
        $currency->save();

        activity()->log('Added new currency: '.$currency->name.' - '.$currency->code);
        
//        Currency::create($request->all());
        return redirect()->route('currencies.index')
                        ->with('success', 'Currency added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        return view('currency.show', compact('currency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        return view('currency.edit', compact('currency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'code' => 'required|max:3'
        ]);

        $currency->name = $request->input('name');
        $currency->code = $request->input('code');
        $currency->save();
        
        activity()->log('Updated currency: '.$currency->name.' - '.$currency->code);

        Session::flash('success','Currency updated successfully.');

        return redirect()->route('currencies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        activity()->log('Deleted currency: '.$currency->name.' - '.$currency->code);
        $currency->delete();
        return redirect()->route('currencies.index');
    }
    
     /**
     * Refresh list with latest live data.
     *
     * @return \Illuminate\Http\Response
     */
    public function refresh()
    {
        $client = new Client();
        $url = env('API_LAYER_URL').'/live?access_key='.env('API_LAYER_TOKEN');
        activity()->log('Refresh Currency List.');
   	    $res = $client->request('GET', $url);
   	    $quotes = json_decode($res->getBody());

        foreach($quotes->quotes as $keypair => $value) {
            $code = Str_replace('USD','',$keypair);
            Currency::where('code','=',$code)->update(['usd_equivalent' => $value]);
        }
        $success = $quotes->success;
        return new JsonResponse(compact('success'));
    }
}

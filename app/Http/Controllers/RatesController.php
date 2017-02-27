<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Rate;
use Session;

class RatesController extends Controller
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
        $rates = Rate::paginate(10);
        return view('rate.index')->withRates($rates);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rate.create');
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
            'pair' => 'required|max:7|min:7',
            'rate' => 'required'
        ]);
        
        $rate = new Rate();
        $rate->pair =  strtoupper($request->input('pair'));
        $rate->rate = $request->input('rate');
        $rate->created_at = Carbon::now();
        $rate->updated_at = Carbon::now();
        $rate->save();

        activity()->log('Added new rate: '.$rate->pair.' - '.$rate->rate);
        
        return redirect()->route('rates.index')
                        ->with('success', 'Rate added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Rate $rate)
    {
        return view('rate.show', compact('rate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rate $rate)
    {
        return view('rate.edit', compact('rate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rate $rate)
    {

        $this->validate($request, [
            'pair' => 'required|max:7|min:7',
            'rate' => 'required'
        ]);
        
        $rate->pair = $request->input('pair');
        $rate->rate = $request->input('rate');
        $rate->save();
        
        activity()->log('Updated rate: '.$rate->pair.' - '.$rate->rate);

        Session::flash('success','Rate updated successfully.');

        return redirect()->route('rates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rate $rate)
    {
        activity()->log('Deleted rate: '.$rate->pair.' - '.$rate->rate);
        $rate->delete();
        return redirect()->route('rates.index');
    }
}

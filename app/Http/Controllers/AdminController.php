<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
use App\AuditTrail;
use Spatie\Activitylog\Models\Activity;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies = Currency::whereIn('code', ['ZAR', 'EUR', 'GBP', 'USD', 'JPY','BTC','AUD'])
                ->orderBy('code')
                ->get();
        return view('admin.index')->withCurrencies($currencies);
    }
    
    public function refreshRates()
    {
        $path = storage_path().'/live.json';
        $contents = File::get($path);
        $currencies = json_decode($contents);
                
        foreach ($currencies->quotes as $key => $value) {
        
        }
    }
    
    public function auditTrail()
    {
        $audits = Activity::orderBy('created_at','desc')->paginate(10);
        // $audits = AuditTrail::orderBy('created_at','desc')
        //         ->paginate(10);
        return view('admin.audit', compact('audits'));
    }
}

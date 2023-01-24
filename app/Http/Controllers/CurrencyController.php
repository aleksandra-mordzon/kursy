<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public $currencies; 

   public function __construct(){
        $this->currencies=Http::get(config('services.nbp.url'))->json();
        
   }
    public function index(){
        return view('index')->with('currencies', $this->currencies[0]["rates"]);
    } 
    
    public function getValue(Request $request){
        $currencyCode=$request->currency;
        if(!empty($currencyCode)){   
            $currencyRecords=Http::get(config('services.nbp.rates').$currencyCode.config('services.nbp.rates_suffix'))->json();
            return view('index')->with('currencyRecords',$currencyRecords)->with('currencies', $this->currencies[0]["rates"]);
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
   

    public function getValue(Request $request){
        $currencies=Http::get('http://api.nbp.pl/api/exchangerates/tables/a')->json();
        $currencyCode=$request->currency;
        $message=null;
        if(!empty($currencyCode)){   
            $currencyRecords=Http::get('http://api.nbp.pl/api/exchangerates/rates/a/'.$currencyCode.'/last/5/?format=json')->json();
            if(empty($currencyRecords))
            {
                $message="Proszę wybrać poprawną walutę!";
            }
            else{
                return view('index')->with('currencyRecords',$currencyRecords)->with('currencies',$currencies[0]["rates"]);
            }
            
        }
        
        return view('index')->with('currencies',$currencies[0]["rates"])->withErrors($message);
        
    }
}

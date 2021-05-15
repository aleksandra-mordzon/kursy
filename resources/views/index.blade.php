<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Kursy</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <style>
        body, html {
            height: 100%!important;
            }
        </style>
    </head>
    <body class="antialiased" style="background-color:#dee0e3">
        <div class="container pt-5" style="background-color:white;height: 100%; " >
            <div class="col">
                <div class="col ms-4">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <li style="color:red">{{$error}}</li>
                        @endforeach
                    @endif
                
                </div>

                <div class="row justify-content-center">
                    <div class="col-6 mb-5 " > 
                        <form action="{{route('getValue')}}" method="GET">
                            <label><h4 >Wybierz walutę:</h4></label>
                            <div class="d-flex mt-2">
                                <select name="currency" class="form-select" >
                                @if(count($currencies)>0)
                                    @foreach($currencies as $currency)
                                        <option value="{{$currency['code']}}"  >{{$currency['code']}} - {{$currency['currency']}}</option> 
                                    @endforeach
                                @endif
                                </select>
                                <button type="submit"  class="btn btn-primary btn-sm" >Ok</button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <div class="col-sm-9">
                    @if(!empty($currencyRecords))
                        <h5>5 ostatnich kursów dla waluty {{$currencyRecords['currency']}}:<br></h5>
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Wartość</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($currencyRecords['rates'] as $currencyRate)
                                <tr>
                                    <th>{{$currencyRate['no']}}</th>
                                    <th>{{$currencyRate['effectiveDate']}}</th>
                                    <th>{{$currencyRate['mid']}}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>
                </div>
            
            </div>
            
        </div>
    </body>
</html>

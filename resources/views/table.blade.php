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
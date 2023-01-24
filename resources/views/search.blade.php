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
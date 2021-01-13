@extends('layouts.app')
@section('content')

    <div class="container">
        
      @foreach ($trdtr as $trdet)
      
        <div class="card mb-3">
          <div class="card-body">
          <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('uploads/'.$trdet->pizza->image)}}"  class="card-img-top" width="440" height="340">
            </div>
            <div class="col-md-8">

                <h1 class="ml-2">{{$trdet->pizza->name}}</h1>
                <h5>Rp. {{$trdet->pizza->price}} </h5>
                <h5>Quantity : {{$trdet->total_qty}}</h5>
                <h5>Total Price : {{$trdet->total_price}}</h5>
                <br>

            </div>
          </div>
          </div>
        </div>
        
      @endforeach
      
    </div>

@endsection

@extends('layouts.app')
@section('content')

    <div class="container">
      @foreach ($vtr as $cartdet)
      
        <div class="card mb-3">
          <div class="card-body">
          <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('uploads/'.$cartdet->pizza->image)}}"  class="card-img-top" width="440" height="340">
            </div>
            <div class="col-md-8">

                <h1 class="ml-2">{{$cartdet->pizza->name}}</h1>
                <h5>Rp. {{$cartdet->pizza->price}} </h5>
                <h5>Quantity : {{$cartdet->total_qty}}</h5>
                <br>

                <div class="row g-3 align-items-center">
                  <div class="col-auto">
                    <label for="inputQty" class="col-form-label">Quantity :</label>
                  </div>
                  <div class="col-auto">
                    <form method="POST" action="{{url('view-cart/'.$cartdet->id)}}">
                    {{-- <form method="POST" action="{{url('update')}}"> --}}
                      {{ csrf_field() }}
                      <input type="number" id="inputQty" name="qty" class="form-control">
                      {{-- </form> --}}
                  </form>
                  </div>
                </div>
                  <div class="col-auto">
                    <form method="POST" action="{{url('view-cart/'.$cartdet->id)}}">
                      @csrf
                      {{-- {{method_field('POST')}} --}}
                      <button type="submit" class="btn btn-primary mt-3">Update Quantity</button>
                    </form>
                    <form method="POST" action="{{url('view-cart/'.$cartdet->id)}}">
                      @csrf
                      {{method_field('DELETE')}}
                      <button type="submit" class="btn btn-danger mt-3">Delete From Cart</button>
                    </form>
                  </div>
            </div>
          </div>
          </div>
        </div>
      @endforeach
      <div>
        <a href="{{url('checkout/')}}" class="btn btn-dark d-md-flex justify-content-md-center">Checkout</a>
      </div>
      
    </div>

@endsection

@extends('layouts.app')
@section('content')



    <div class="container">
        <div class="row pt-5">

            <div class="col border-top border-left border-bottom pt-3 pb-3">
                <img src="{{asset('uploads/'.$pizdet->image)}}"  class="card-img-top" width="440" height="340">
            </div>
            <div class="col  border-top border-bottom pt-3">

                <h1 class="ml-2">{{$pizdet->name}}</h1>
                <h5> {{$pizdet->description}} </h5>
                <br>
                <br>
                <h5>Rp. {{$pizdet->price}} </h5>
                <br>
                @if(Auth::guest())


                @else
                    @if(auth()->user()->role=='User')

                <div class="row">
                    <div class="col-auto">
                        <label for="inputQty" class="col-form-label">Quantity :</label>
                    </div>


                    <div class="col-auto">
                        <form method="POST" >
                            {{-- action="{{url('pizza-detail/'.$pizdet->id)}}" --}}
                            @csrf
                            <input type="number" id="inputQty" name="qty" class="form-control">
                            <button type="submit" class="btn btn-primary mt-3">Add to Cart</button>
                        </form>
                    </div>
                </div>
                    @endif
                @endif

            </div>

@endsection

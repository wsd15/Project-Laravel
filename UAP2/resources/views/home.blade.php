@extends('layouts.app')

@section('content')


    <div class="container">
        <div>
            <h1>Our Freshly Made Pizza!</h1>
        </div>
        <div>
            <h2>Order it now!</h2>
        </div>
        <div class="container-fluid">
            @if(Auth::guest())
                <form class="d-flex mt-3 mb-3" action="/search" method="GET">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search Pizza" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            @else
                @if(auth()->user()->role=='User')
                    <form class="d-flex mt-3 mb-3" action="/search" method="GET">
                        <input class="form-control me-2" name="search" type="search" placeholder="Search Pizza" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                @elseif(auth()->user()->role=='Admin')

                <a href="{{url('add-pizza/')}}">
                    <button class="btn btn-dark mb-3" type="submit"  >Add Pizza</button>
                </a>


                 @endif
                 @endif


        </div>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($piz as $pizza)
                <div class="col">
                    <div class="card h-100">
{{--                        --}}
                        <a href="{{url('/pizza-detail/'.$pizza->id)}}" >
                            <img src="{{asset('uploads/'.$pizza->image)}}"  class="card-img-top" width="360" height="240">
                        </a>

                        <div class="card-body">
                            <h5 class="card-title">{{$pizza->name}}</h5>
                            <p class="card-text">Rp. {{$pizza->price}}</p>
                            @if(Auth::guest())

                                @elseif(Auth::user())

                                @if(auth()->user()->role=='Admin')
                            <div class="d-grid gap-4 d-md-flex justify-content-md-center">
                                <a href="{{action('PizzaController@edit', $pizza['id'])}}" class="btn btn-primary">Update Pizza</a>


{{--                                <a href="{{action('PizzaController@delete', $pizza['id'])}}" class="btn btn-danger">Delete Pizza</a>--}}

                                <form method="post" class="delete_form" action="{{action('PizzaController@destroy', $pizza['id'])}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger">Delete Pizza</button>
                                </form>

                            </div>
                                @endif
                                @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $piz->links() }}
    </div>

@endsection

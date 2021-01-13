@extends('layouts.app')

@section('content')

    <div> <h1 class="font-weight-bold"></h1>
        <div class="d-flex justify-content-md-start">
            @foreach($alluser as $user)
                    <div class="card ml-lg-5 border " style="width: 18rem;background-color: #f94144">
                        <h8 class="card-title mt-2 ml-4">User ID : {{$user->id}}</h8>
                        <div class="card-body  d-flex flex-column" style="background-color: white;">
                            <h8 class="card-title">Username : {{$user->name}}</h8>
                            <h8 class="card-title">Email : {{$user->email}}</h8>
                            <h8 class="card-title">Address : {{$user->address}}</h8>
                            <h8 class="card-title">Phone Number : {{$user->phone}}</h8>
                            <h8 class="card-title">Gender : {{$user->gender}}</h8>
                        </div>
                    </div>
            @endforeach
        </div>
        <br>
    </div>

@endsection

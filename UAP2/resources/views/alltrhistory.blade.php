@extends('layouts.app')
@section('content')

<div class="container">
        @foreach ($alldcart as $his)
            <a href="{{url('tr-detail/'.$his->id)}}" class="btn btn-danger mt-2 d-md-flex justify-content-md-center">
                Transaction at {{$his->date}} <br>
                User ID : {{$his->user_id}}
                {{-- Username : {{$his->user_id->name}} --}}
            </a>
        @endforeach
  </div>
@endsection
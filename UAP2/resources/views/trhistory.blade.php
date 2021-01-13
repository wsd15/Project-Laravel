@extends('layouts.app')
@section('content')

<div class="container">
        @foreach ($dcart as $his)
            <a href="{{url('tr-detail/'.$his->id)}}" class="btn btn-danger mt-2 d-md-flex justify-content-md-center">Transaction at {{$his->date}}</a>
        @endforeach
  </div>
@endsection
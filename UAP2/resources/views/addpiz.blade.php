@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST" action="{{url('add-pizza/')}}" enctype="multipart/form-data" >
                            @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-3  text-md-right">{{ __('Pizza Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="Masukan Nama" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-sm-3  text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" placeholder="Masukan Deskripsi" class="form-control @error('name') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-3  text-md-right">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="price" type="text" placeholder="Masukan Angka" class="form-control @error('name') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

{{--                        <div class="form-group row">--}}
{{--                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

{{--                            <div class="col-md-6">--}}
{{--                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}

{{--                                @error('name')--}}
{{--                                <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}
                            <div class="form-group row ">
                                <div class="col-md-6 text-md-right">
                                    <label class="" for="exampleFormControlFile1">Select Picture</label>
                                    <input class="col-md-6 text-md-right "type="file" id="image" name="image" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </div>



                            <br>

{{--                            <div class="form-group row mb-0">--}}
                                <div class="form-group offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add Pizza') }}
                                </button>

                        </div>



            </form>
        </div>
    </div>
    </div>
    </div>

@endsection

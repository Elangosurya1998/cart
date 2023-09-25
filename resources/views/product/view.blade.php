@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        View Products
                    </div>
                    <div class="card-body">
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">Name : {{ $data->name }}</label>

                            </div>
                            <div class="col-md-12">
                                <label for="">Price : {{ $data->price }}</label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                <label for="">Image</label><br>
                                <img src="{{ asset('products/image/' . $data->image) }}" width="100" alt=""><br>
                                <a href="{{ asset('products/image/' . $data->image) }}"
                                    download>{{ $data->image ?? '' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

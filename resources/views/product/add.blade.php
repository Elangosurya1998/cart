@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Add Products
                    </div>
                    <div class="card-body">
                        @if (isset($data))
                            <form action="{{ route('products.update') }}" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                            @else
                                <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                        @endif
                        @csrf
                        <div class="row form-group">
                            <div class="col-md-6">
                                <label for=""></label>
                                <input class="form-control" type="text" name="name" value="{{ $data->name ?? '' }}"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for=""></label>
                                <input class="form-control" type="text" name="price" value="{{ $data->price ?? '' }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"
                                    maxlength="5" required>
                            </div>
                            <div class="col-md-12">
                                <label for=""></label>
                                <input class="form-control docs" type="file" name="image" value=""
                                    {{ isset($data) ? '' : 'required' }}>
                                <input type="hidden" name="image_old" value="{{ $data->image ?? '' }}">
                                @if (isset($data))
                                    <img src="{{ asset('products/image/' . $data->image) }}" width="100" alt="">
                                    <a href="{{ asset('products/image/' . $data->image) }}"
                                        download="">{{ $data->image ?? '' }}</a>
                                @endif

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="{{ route('products') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

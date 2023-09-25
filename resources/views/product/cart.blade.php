@extends('layouts.app')
@section('content')
    @php
        use App\Helpers\CartHelpers;
    @endphp
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="card">
                    <div class="card-header">
                        Products <a href="{{ route('products.create') }}" class="btn btn-success"
                            style="float:right;margin-left:1rem;">Add</a><a href="{{ route('products.cart') }}"
                            class="btn btn-success" style="float:right">Cart</a>
                    </div>
                    <div class="card-body">
                        <div style="display: flex;gap:2rem;">
                            @foreach ($data as $product)
                                <div class="flex:1">
                                    <img src="{{ asset('products/image/' . $product->image) }}" width="200">
                                    <h5>{{ $product->name }}</h5>
                                    <p>{{ $product->price }}</p>
                                </div>
                            @endforeach
                        </div>
                        <p>
                        <form action="{{ route('products.checkout') }}" method="get">
                            @csrf
                            <button class="btn btn-primary" type="submit">checkout</button>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

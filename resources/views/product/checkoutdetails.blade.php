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
                        Products Checkout Details
                    </div>
                    <div class="card-body">
                        <table class="table table-striped datatable" border="1" id="table-list">
                            <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $cart)
                                    <tr>
                                        <td>{{ $cart->user->name }}</td>
                                        <td>{{ $cart->product->name }}</td>
                                        <td>{{ $cart->quantity }}</td>
                                        <td>
                                            <img src="{{ asset('products/image/' . $cart->product->image) }}" alt=""
                                                width="100">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

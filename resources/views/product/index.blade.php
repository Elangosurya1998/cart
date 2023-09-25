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
                            class="btn btn-warning" style="float:right;margin-left:1rem;">Cart</a><a
                            href="{{ route('products.checkoutDetails') }}" class="btn btn-primary"
                            style="float:right">Checkout
                            Details</a>
                    </div>
                    <div class="card-body">
                        @if (Session::has('success'))
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <table class="table table-striped datatable" border="1" id="table-list">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td><img src="{{ asset('products/image/' . $product->image) }}" alt=""
                                                width="100"></td>
                                        <td style="width: 200px">
                                            <a href="{{ route('products.view', CartHelpers::encryptUrl($product->id)) }}"
                                                class="btn btn-secondary">View</a>
                                            <a href="{{ route('products.edit', CartHelpers::encryptUrl($product->id)) }}"
                                                class="btn btn-primary">Edit</a>
                                            <form
                                                action="{{ route('products.destroy', CartHelpers::encryptUrl($product->id)) }}"
                                                method="get" onsubmit="return confirm('Are you sure want to delete?');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="Delete">
                                            </form>
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Traits\ImageUploadTrait;
use App\Helpers\CartHelpers;
use App\Models\CartItem;

class ProductController extends Controller
{
    use ImageUploadTrait;

    public function index(Request $request)
    {
        $products = Product::latest('id')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.add');
    }

    public function view($id)
    {
        $data = Product::where('id', CartHelpers::decryptUrl($id))->first();

        return view('product.view', compact('data'));
    }

    public function store(Request $request)
    {
        $input = $request->except('image', '_token');

        $file = $request->image;

        $destination = "products/image";
        $value = $this->fileUpload($file, $destination);
        $input['image'] = $value;

        $data = new Product;
        $data->create($input);

        Session::flash('success', 'Your Product Added Successfully.');

        return redirect()->route('products');
    }

    public function edit($id)
    {
        $data = Product::where('id', CartHelpers::decryptUrl($id))->first();

        return view('product.add', compact('data'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $input = $request->except('image', '_token');

        $file = $request->image;

        if ($file) {
            $destination = "products/image";
            $value = $this->fileUpload($file, $destination);
            $input['image'] = $value;

            $this->fileUnlink($request->image_old, $destination);
        } else {
            $input['image'] = $request->image_old;
        }

        $data = Product::where('id', $request->id)->first();
        $data->update($input);

        Session::flash('success', 'Your Product Updated Successfully.');

        return redirect()->route('products');
    }

    public function destroy(Request $request, $id)
    {
        $data = Product::where('id', CartHelpers::decryptUrl($id))->first();

        $data->cartItems()->delete();

        $data->delete();

        Session::flash('success', 'Your Product Deleted Successfully.');

        return redirect()->route('products');
    }

    public function cart()
    {
        $data = Product::all();

        return view('product.cart', compact('data'));
    }

    public function checkout(Request $request)
    {
        $data = Product::all();

        foreach ($data as $value) {
            $input['product_id'] = $value->id;
            $input['quantity'] = random_int(100, 10);
            $input['user_id'] = random_int(1, 10);
            $checkout = new CartItem;
            $checkout->create($input);
        }

        return redirect()->route('products.checkoutDetails');
    }

    public function checkoutDetails()
    {
        $data = CartItem::with('user', 'product')->get();

        dd($data);

        return view('product.checkoutDetails', compact('data'));
    }
}

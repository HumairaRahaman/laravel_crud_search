<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class productController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('products.index', compact(['products',]));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductStoreRequest $request)
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();
            return back()->withSuccess('PRODUCT Successfully Created!');
        } catch (\Exception $e) {
            Log::error('error', [$e]);
            return back()->withError('internal server Error!');
        }
    }

    public function edit($product_id)
    {

        $product = Product::where('id', $product_id)->firstOrFail();
        return view('products.edit', compact(['product']));
    }

    public function update(ProductUpdateRequest $request, $product_id)
    {
        try {
            $product = Product::where('id', $product_id)->firstOrFail();
            $product->name = $request->name;
            $product->description = $request->description;
            $product->save();
            return back()->withSuccess('PRODUCT Successfully Updated!');
        } catch (\Exception $e) {
            Log::error('error', [$e]);
            return back()->withError('Internal server Error!');
        }
    }

}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class productController extends Controller
{
    public function index()
    {
        return view('products.index');
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
            Log::error('error',[$e]);
            return back()->withError('enternal server Error!');
        }
    }
    public  function edit($product_id){

        $product = Product::where('id',$product_id)->findOrFail($product_id);
        return view('products.edit',compact(['product']));
    }
}

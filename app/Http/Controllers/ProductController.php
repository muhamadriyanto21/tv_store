<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\validate;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return $product;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credential = Validator::make($request->all(), [
            'product_idcategory',
            'name_product',
            'price',
            'details',
        ]);

        if ($credential->fails()) {
            return redirect('register')
                ->withErrors($credential)
                ->withInput();
        }

        $pasien = Product::create([
            'product_idcategory' => $request->product_idcategory,
            'name_product' => $request->name_product,
            'price' => $request->price,
            'details' => $request->details,
        ]);

        return 'Product Added Successfully';
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return $product;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $product->product_idcategory = $request->product_idcategory;
        $product->name_product = $request->name_product;
        $product->price = $request->price;
        $product->details = $request->details;
        $product->update();
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return $product;
    }
}

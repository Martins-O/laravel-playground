<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;


class ProductsController extends Controller
{
    public function index() {
        $products = Products::all();
        return view('products.index', ['products' => $products]);
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required',
            'price' =>'required|decimal:0,2',
            'description' =>'nullable',
            'quantity' =>'required|numeric'
        ]);

        Products::create($request->all());
        return redirect(route('product.index'));
    }

    public function edit(Products $product){
//        dd($product);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Request $request, Products $product){
        $request->validate([
            'name' =>'required',
            'price' =>'required|decimal:0,2',
            'description' =>'nullable',
            'quantity' =>'required|numeric'
        ]);

        $product->update($request->all());
        return redirect(route('product.index'))->with('success', 'Product updated successfully');
    }

    public function destroy(Products $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted successfully');
    }
}

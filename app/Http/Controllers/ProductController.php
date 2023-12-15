<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();

        return view('product', compact('products'));
    }


    public function storeForm()
    {
        return view('addProduct');
    }


    public function store(Request $request)
    {

        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        DB::table('products')->insert(
            ['name' => $name, 'quantity' => $quantity, 'price' => $price]
        );

        return redirect('/product')->with('status', 'Product upload successfully');
    }


    public function updateForm(Request $request)
    {

        $id = $request->input('id');

        $product = DB::table('products')->where('id', $id)->first();

        return view('addQuantity', compact('product'));
    }


    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $quantity = $request->input('quantity');

        DB::table('products')->where('id', $id)->update(['name' => $name, 'quantity' => $quantity]);

        return redirect('/product')->with('status', 'Product update successfully');
    }


    public function sellForm(Request $request)
    {

        $id = $request->input('id');

        $product = DB::table('products')->where('id', $id)->first();

        return view('sellProduct', compact('product'));
    }


    public function sell(Request $request)
    {

        $product_id = $request->input('id');
        $name = $request->input('name');
        $quantity = $request->input('quantity');
        $price = $request->input('price');

        $previousQuantity = DB::table('products')->select('quantity')->where('id', $product_id)->first();
        $newQuantity = $previousQuantity->quantity - $quantity;

        if ($newQuantity > 0) {
            $priceUpdate = DB::table('products')->where('id', $product_id)->update(['quantity' => $newQuantity]);

            if ($priceUpdate) {

                DB::table('sell_products')->insert(
                    ['product_id' => $product_id, 'name' => $name, 'quantity' => $quantity, 'price' => $price]
                );
            }

            return redirect('/product')->with('status', 'Product sell successfully');
        } else {

            return redirect('/product')->with('status', 'Product is not found');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::all();
        return view('cart.index', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('cart.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request -> validate([
            'product_id' =>'required',
            'product_qty' => 'required | min : 0 | max : 1000',
            'total_price' => 'required |min :0 | max : 100000000',
        ],
        [
            'product_id.required' =>'Product id is required', 
            'product_qty.required' =>'Product quantity is required',
            'product_qty.min' => 'min 0 quantity',
            'product_qty.max' => 'max 100 quantities',
            'total_price.required'=> 'total price is required',
            'total_price.max'=> 'max 100000000',
        ]);

        Cart::create([
            'product_id' => $request ->product_id,
            'product_qty' =>  $request->product_qty,
            'total_price' =>  $request->total_price,
            'status_checkout' =>0,
        ]);
        return redirect('/cart')-> with('status', 'Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        $product = Product::all();
        return view('cart.update' ,compact('cart','product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        
        $request -> validate([
            'product_id' =>'required',
            'product_qty' => 'required | min : 0 | max : 1000',
            'total_price' => 'required |min :0 | max : 100000000',
        ],
        [
            'product_id.required' =>'Product id is required', 
            'product_qty.required' =>'Product quantity is required',
            'product_qty.min' => 'min 0 quantity',
            'product_qty.max' => 'max 100 quantities',
            'total_price.required'=> 'total price is required',
            'total_price.max'=> 'max 100000000',
        ]);
        Cart::where('id', $cart->id)->update([
            'product_id' => $request ->product_id,
            'product_qty' =>  $request->product_qty,
            'total_price' =>  $request->total_price,
            'status_checkout' =>0,
        ]);
        return redirect('/cart')->with('status', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        Cart:: destroy('id', $cart->id);
        return redirect('/cart') ->with ('status', 'Deleted Succesfully');
     
    }
}
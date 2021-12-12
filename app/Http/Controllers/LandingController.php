<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Courier;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $product = Product::orderByDesc('product_soldout')->get();
        // return $product;
        return view('landingpage.index', compact('category', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //Membuat data
    {
        return 'creat';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) //menampilkan data dari satu tabel(detail)
    {
        $product = Product::where('id', $id) -> first();
        // return $product;
        return view('landingpage.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) 
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function keranjang()
    {
        $cart = Cart::where('user_id', Auth::user()->id)->where('status', 'belum')->get();
        // untuk ambil semua
        // $cart = Cart::all();
        $totalharga = Cart::where('user_id', Auth::user()->id)->where('status', 'belum')->sum('total_price');
        $courier = Courier::all();
        $paymentmethod = PaymentMethod::all();
        return view('landingpage.keranjang', compact('cart', 'courier', 'paymentmethod', 'totalharga'));
    }
    public function keranjang_store(Request $request)
    {
        // return $request;

        $request->validate(
            [
                'kuantitas' => 'required',
            ],
            [
                'kuantitas.required' => 'Kuantitas  is required',
            ]
        );
        $product = Product::where('id', $request->product_id)->first();
        // return $product;

        $cart = Cart::where('user_id', Auth::user()->id)->where('status', 'belum')->get();
        foreach ($cart as $item) {
            if ($item->product_id == $request->product_id) {
                Cart::where('product_id', $item->product_id)->update([

                    'product_qty' =>  $item->product_qty + $request->kuantitas,
                    'total_price' => ($item->product_qty + $request->kuantitas) * $item->product->product_price
                ]);
                return redirect('/keranjang');
            }
        }

        Cart::create([
            'user_id' => Auth::user()->id,
            //
            'product_id' => $request->product_id,
            'product_qty' =>  $request->kuantitas,
            'total_price' => ($request->kuantitas) * ($product->product_price),
            'status' => 'belum',
            'status_checkout' => 0,
        ]);
        return redirect('/keranjang');
    }
}

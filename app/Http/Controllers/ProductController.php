<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create', compact('category'));
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
        $request->validate(
            [
                'categoryid' => 'required',
                'productname' => 'required|min:2|max:100',
                'image' => 'required',
                'productstock' => 'required',
                'productprice' => 'required',
                'condition' => 'required',
                'weight' => 'required',
                'productdescription' => 'required|min:2'
            ],
            [
                'productname.required' => 'Product Name harus di isi',
                'productname.min' => 'Kolom ini tidak boleh kurang dari 2 kata',
                'productname.max' => 'Kolom ini tidak boleh lebih dari 100 kata',
                'image.required' => 'Gambar harus Harus di isi',
                'productstock.required' => 'Product Stock harus di isi',
                'productprice.required' => 'Product price harus di isi',
                'productdescription.required' => 'Product description harus di isi',
                'productdescription.min' => 'Kolom ini tidak boleh kurang dari 20 kata',
                'productdescription.max' => 'Kolom ini tidak boleh lebih dari 1500 kata',

            ]
        );
        $img = $request->file('image');//Menggambil file dari form
        $filename = time(). "-". $img->getClientOriginalName(); //mengambil dan mengedit nama file dari form
        $img->move('img/', $filename); //proses memasukkan file kedalam direktori laravel
    
        Product::create(
            [
                "category_id" => $request->categoryid,
                "product_name" => $request->productname,
                "product_stock" => $request->productstock,
                "image" => $filename,
                "product_price" => $request->productprice,
                "product_description" => $request->productdescription,
                "product_soldout" => 0,
                "product_review" => 0,
                "condition" => $request->condition,
                "weight" => $request->weight
            ]
        );
        return redirect('/product');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.update', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('product.update', compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // return $request;
        if($request ->image !=null){
            $img = $request->file('image'); //mengambil dari form
            $filename = time() . "_" . $img->getClientOriginalName();
            $img->move('img', $filename);
        Product::where('id', $product->id)->update(
                [
                    "category_id" => $request->categoryid,
                    "product_name" => $request->productname,
                    "product_stock" => $request->productstock,
                    "image" => $filename,
                    "product_price" => $request->productprice,
                    "product_description" => $request->productdescription,
                    'condition' => $request->condition,
                    'weight' => $request->weight,
                    "product_soldout" => 0,
                    "product_review" => 0
                ]
            );

        }else{
            Product::where('id', $product->id)->update(
            [
                "category_id" => $request->categoryid,
                "product_name" => $request->productname,
                "product_stock" => $request->productstock,
                "product_price" => $request->productprice,
                "product_description" => $request->productdescription,
                'condition' => $request->condition,
                'weight' => $request->weight,
                "product_soldout" => 0,
                "product_review" => 0
            ]
            );

        }
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy('id', $product->id);
        return redirect('/product');
    }
}

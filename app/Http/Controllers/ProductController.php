<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public function showProduct()
//    {
//        $products= Product::where('category_id',2)->get();
//        $products= Product::find(1);
//        foreach ($products->bills as $bill){
//                echo $bill->pivot->id;
//        }
//        return view('backend.products.list ', compact('products'));
//    }

    public function index()
    {
        $products = Product::all();
        return view('backend.products.list ', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request->file());

        $path= $request->file('fileToUpload')->store('images','public');

        $product = new Product();
        $product->image= $path;
        $product->name = $request->name_product;
        $product->price = $request->price_product;
        $product->category_id = $request->id_category;
        $product->describes = $request->describes;
        $product->status = $request->status;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('backend.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name_product;
        $product->price = $request->price_product;
        $product->id_category = $request->id_category;
        $product->describes = $request->describes;
        $product->status = $request->status;
        $product->save();
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        toastr()->success('xóa thành công', 'delete');
//        toastr()->success('Đã xóa thành công','Delete');
        return redirect()->route('product.index');
    }
}

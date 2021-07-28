<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

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
    public function showproduct(){
        $products = Product::all();
        return view('fontend.index',compact('products'));
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

    public function showCart(){

        $cart= session()->get('cart');
//        dd($cart);
        return view('fontend.product.cart', compact('cart'));
    }

    public function addToCart($id)
    {

        $carts= session()->get('cart');
        $product= Product::findOrFail($id);
        if (!$carts){
            $carts= [
                $id=>[
                    'name'=>$product->name,
                    'price'=>$product->price,
                    'quatity'=>1,
                    'image'=>$product->image
                ]
            ];
        }
        if (isset($carts[$id])){
            $carts[$id]['quatity'] ++;
            session()->put('cart', $carts);
            return redirect()->back();
        }
        $carts[$id]=[
            'name'=>$product->name,
            'price'=>$product->price,
            'quatity'=>1,
            'image'=>$product->image
        ];


    }
}

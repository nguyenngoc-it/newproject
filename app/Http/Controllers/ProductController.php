<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MongoDB\Driver\Session;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $user= Auth::user();
        if (Gate::allows('show-dashboard', $user)){
            if (Auth::check()){
                $products = Product::all();
                return view('backend.products.list ', compact('products'));
            }
            else{
                toastError('Bạn cần đăng nhập vào trang admin', 'hong bao');
                return  redirect()->route('login');
            }
        }else{
            abort(403);
        }


    }

    public function getProduct()
    {
        $products = Product::all();
        return view('fontend.index', compact('products'));
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

        $path = $request->file('fileToUpload')->store('images', 'public');

        $product = new Product();
        $product->image = $path;
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
        $product->category_id = $request->id_category;
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

    public function showCart()
    {

        $cart = session()->get('cart');
//        dd($cart);
        return view('fontend.product.cart',compact('cart'));
    }


    public function addToCart($id)
    {

        $product = Product::findOrFail($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += 1;
        } else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1
            ];
        }
        session()->put('cart', $cart);
        toastr()->success('thêm thành công', 'Thông báo');
        return response()->json($cart);

    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity){
            $carts= session()->get('cart');
            $carts[$request->id]['quantity']= $request->quantity;
            session()->put('cart', $carts);
            $carts= session()->get('cart');
            $cartCompoment= view('fontend.product.compoments.cart_compoment', compact('carts'))->render();

            return response()->json(['cart_compoment'=> $cartCompoment, 'code'=>200], 200);
        }
    }
}

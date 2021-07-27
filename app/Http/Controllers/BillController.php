<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use App\Models\Product;

class BillController extends Controller
{

    public function showproduct()
    {

//        $bill= Bill::find(1);
//        $bill->products()->attach([1, 2, 3]);
        $bill= Bill::find(1);
        foreach ($bill->products as $product){
          echo $product->id;
        }

//        dd($bill);
//        $products= $bill->product;
//        dd($products);
//        foreach ($bill->product as $product){
//
//        }

    }
}

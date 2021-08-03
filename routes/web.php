<?php

use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//route index
Route::prefix('index')->group(function (){
    Route::get('/',[ProductController::class,'getProduct'])->name('index.getProduct');

});

// route product
Route::prefix('products')->group(function (){
    Route::get('/', [ProductController::class,'index'])->name('product.index');
    Route::get('/create', [ProductController::class,'create'])->name('product.create');
    Route::post('/create', [ProductController::class,'store'])->name('product.store');
    Route::post('/update/{id}', [ProductController::class,'update'])->name('product.update');
    Route::get('/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::get('/delete/{id}', [ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/detail', function ()
    {
        return view('fontend.product.productdetail');
    });

});
//route cart
Route::prefix('cart')->group(function ()
{
    Route::get('/',[ProductController::class,'showCart'])->name('cart.showCart');
//    Route::get('/addtocart/{id}', [ProductController::class, 'addToCart'])->name('cart.addtocart');
    Route::get('/addToCart/{id}', [ProductController::class,'addToCart'])->name('cart');
    Route::get('/updateQuantity/{id}', [ProductController::class,'updateCart'])->name('updateCart');
});

// route register
Route::prefix('register')->group(function ()
{
    Route::get('/',[UserController::class,'create'])->name('register.create');
    Route::post('create',[UserController::class,'store'])->name('register.store');
});
// route login
Route::prefix('login')->group(function (){
    Route::get('/login',[UserController::class,'showFormLogin'])->name('showFormLogin');
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/logOut', [UserController::class,'logOut'])->name('logOut');
});


Route::get('/weather',[\App\Http\Controllers\WeatherController::class,'weather'])->name('weather');



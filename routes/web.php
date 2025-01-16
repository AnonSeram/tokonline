<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OngkirController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    route::get('/redirect',[HomeController::class,'redirect']);
});

route::get('/view_category',[AdminController::class,'view_category']);
route::post('/add_category',[AdminController::class,'add_category']);
route::get('/delete_category/{id}',[AdminController::class,'delete_category']);


route::get('/view_product',[AdminController::class,'view_product']);
route::post('/add_product',[AdminController::class,'add_product']);
route::get('/show_product',[AdminController::class,'show_product']);

route::get('/delete_product/{id}',[AdminController::class,'delete_product']);
route::get('/update_product/{id}',[AdminController::class,'update_product']);

route::post('/update_product_confirm/{id}',[AdminController::class,'update_product_confirm']);

route::get('/product_details/{id}',[HomeController::class,'product_details']);
route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

route::get('/show_cart', [HomeController::class, 'show_cart'])->name('show_cart');
route::post('/show_cart', [HomeController::class, 'cekOngkir']);
route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);

route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}',[HomeController::class,'stripePost'])->name('stripe.post');

route::get('/order',[AdminController::class,'order']);
route::get('/delivered/{id}',[AdminController::class,'delivered']);

route::get('/product_search',[HomeController::class,'product_search']);
Route::post('/cek-ongkir', [HomeController::class, 'cekOngkir'])->name('cek.ongkir');
Route::post('/pilih-service', [ServiceController::class, 'store'])->name('pilih.service');

route::get('/products',[HomeController::class,'product']);
route::get('/search_product',[HomeController::class,'search_product']);

route::any('/checkout', [HomeController::class, 'checkout'])->name('checkout');
route::get('/all_products',[HomeController::class,'all_product']);


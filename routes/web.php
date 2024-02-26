<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\Admin\OrderManagerController;
use App\Http\Controllers\Admin\OrderDetailManagerController;
use App\Http\Controllers\Admin\RevenueManagerController;
use App\Http\Controllers\Admin\CommentManagerController;

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
// ->middleware('checklogin::class')

Route::get('/contact',[ContactController::class, 'index'])->name('contact');
Route::post('/donecontact', [ContactController::class, 'store']);

Route::get('/cart', [CartController::class,'cartList'])->name('cart')->middleware('checklogin::class');
Route::post('/cart', [CartController::class,'addToCart'])->name('cart.store');
Route::post('/update-cart', [CartController::class,'updateCart'])->name('cart.update');
Route::post('/delete', [CartController::class,'removeCart'])->name('cart.delete');
Route::post('/clear', [CartController::class,'cleaAllCart'])->name('cart.clear');


Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->middleware('checkadmin::class')->group(function(){
    Route::get('/', [AdminController::class, 'index']);
    Route::prefix('/products')->group(function(){
        Route::get('/', [ProductsController::class, 'index'])->name('products_display');
        Route::get('/create', [ProductsController::class, 'create'])->name('create_products');
        Route::post('/store', [ProductsController::class, 'store']);
        Route::get('/edit/{id}', [ProductsController::class, 'edit']);
        Route::patch('/update/{id}', [ProductsController::class, 'update']);
        Route::get('/delete/{id}', [ProductsController::class, 'destroy']);
    });
    Route::prefix('/orders')->group(function(){
        Route::get('/', [OrderManagerController::class, 'index']);
        Route::get('/edit/{id}', [OrderManagerController::class, 'edit']);
        Route::get('/destroy/{id}', [OrderManagerController::class, 'destroy']);
        Route::post('/detail', [OrderDetailManagerController::class, 'store']);
        Route::post('/search', [OrderManagerController::class, 'search']);
    });
    Route::prefix('/revenue')->group(function(){
        Route::get('/', [RevenueManagerController::class, 'index']);
        Route::get('/detail/{id}', [RevenueManagerController::class, 'edit']);
        
    });
    Route::prefix('/comment')->group(function(){
        Route::get('/', [CommentManagerController::class, 'index']);
        Route::get('/edit/{id}', [CommentManagerController::class, 'edit']);
        Route::get('/delete/{id}', [CommentManagerController::class, 'destroy']);
    });
});

Route::prefix('shop')->group(function(){
    Route::get('/', [ShopController::class, 'index'])->name('shop');
    Route::get('/detail/{id}', [ShopController::class, 'show'])->name('detail');
});
Route::get('/search', [ShopController::class, 'search'])->name('search');
Route::get('/filter', [ShopController::class, 'filter'])->name('filter');
Route::post('/confirm', [ShopController::class, 'comment']);
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/done_order', [OrderController::class, 'store']);
Route::get('/delete-order/{id}', [OrderController::class, 'destroy']);
Route::post('/status-order', [OrderDetailController::class, 'store']);
Route::get('/detail-order', [OrderDetailController::class, 'index']);
Route::get('/done/{id}', [OrderDetailController::class, 'edit']);

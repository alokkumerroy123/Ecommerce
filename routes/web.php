<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\CartController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

//main dashboard page view route
Route::get('/',[FrontendController::class,'index'])->name('home');

//add to cart
Route::get('add/cart/{id}',[CartController::class,'addCart'])->name('add.cart');
Route::get('cart',[CartController::class,'show'])->name('show.cart');

//login page view route
Route::get('login',[LoginController::class,'index'])->name('login');
//submit login
Route::post('login',[LoginController::class,'login']);
//regestration page view
Route::get('register',[UserController::class,'register'])->name('register');
//registration data submit database
Route::post('register',[UserController::class,'doregister']);




Route::middleware('auth')->group(function(){

//customer profile page view route
    Route::get('profile',[UserController::class,'profile'])->name('profile');

//customer profile update
    Route::post('profile',[UserController::class, 'updateProfile']);
    //logout route
    Route::get('logout',[LoginController::class,'logout'])->name('logout');

//order view in profile.blade.php page
    Route::get('profile/{id}/order',[UserController::class,'order'])->name('profile.order');
//checkout pager view
    Route::get('checkout',[CartController::class,'checkout'])->name('checkout');
//oeder
    Route::post('checkout',[CartController::class,'order']);


    Route::middleware('IsAdmin')->prefix('dashboard')->group(function(){


    //backend er dashboard.blade.php page view korano hoyace
        Route::get('/',[DashboardController::class,'index'])->name('dashboard');

//view er vetor backend folder er vetor products folder er vetor index.blade.php page view
        Route::get('/products',[ProductController::class,'index'])->name('admin.product'); 
//view er vetor backend folder er vetor products folder er vetor create.blade.php page view 
        Route::get('/products/create',[ProductController::class,'create'])->name('admin.product.create');
//create.blade.php page er form er databasea data submit 
        Route::post('/products/create',[ProductController::class,'store']);
//edit.blade.php page a jaoyar jonno route
        Route::get('products/{id}/edit',[ProductController::class,'edit'])->name('admin.product.edit');
//edit data submit in database
        Route::post('products/{id}/edit',[ProductController::class,'update']);
//delete product route
        Route::get('products/{id}/delete',[ProductController::class,'delete'])->name('admin.product.delete');
//customer order show
        Route::get('order',[OrderController::class,'index'])->name('admin.order');

//admin show the order
        Route::get('order/{id}',[OrderController::class,'show'])->name('admin.order.show');
         //confirm,pending,rejeceted
        Route::post('order/{id}/status',[OrderController::class,'update'])->name('admin.order.update');



    });
});





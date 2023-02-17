<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/



//admin routes

Route::post("/admins/register",[AdminController::class,'register']);
Route::post("/admins/login",[AdminController::class,'login']);


// user routes 


Route::resource('/users',UserController::class);
Route::post("/users/login",[UserController::class,'login']);


// Category routes 
Route::resource('/categories',CategoryController::class);
// product routes 
Route::resource("/products",ProductController::class);

Route::get("/productswithcart/{userid}",[ProductController::class,'allProducts']);
Route::delete("/removefromcart/{userid}/{productid}",[UserProductController::class,'removeFromCart']);

Route::get("/cart/{id}",[UserProductController::class,'userProducts']);
Route::post('/cart/add',[UserProductController::class,'store']);
Route::put("/cart/update/{id}",[UserProductController::class,'update']);



// Route::middleware('auth:sanctum')->get("/users/something",[UserController::class,"justKidding"]);


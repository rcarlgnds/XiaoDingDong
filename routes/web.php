<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', [FoodController::class, 'viewFood']);

//Route::get('/', function () {
//    return view('pages.manage.createfood');
//});

Route::get('/home', [FoodController::class, 'viewFood'])->name('home');
Route::get('/detail/{id}', [FoodController::class, 'detailRouter']);

Route::get('/login', [AuthController::class, 'loginRouter'])->middleware('mdw.user');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerRouter'])->middleware('mdw.user');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/cart', [CartController::class, 'viewCart'])->middleware('mdw');
Route::post('/cart', [CartController::class, 'editQuantity']);
Route::post('/addToCart', [CartController::class, 'addToCart']);
Route::post('/deleteFromCart', [CartController::class, 'deleteFromCart']);

Route::post('/deleteFood', [FoodController::class, 'deleteFood']);

Route::get('/profile', [AuthController::class, 'profileRouter'])->middleware('mdw');
Route::get('/transactionHistory', [AuthController::class, 'transactionRouter'])->middleware('mdw');
Route::get('/transactionHistory', [TransactionController::class, 'viewTransactionHistory'])->name('transaction.history')->middleware('mdw');
Route::post('/home', [AuthController::class, 'logout']);

Route::get('/checkOut', [CartController::class, 'checkoutRouter'])->middleware('mdw');
Route::post('/checkOut', [CartController::class, 'checkOutValidation']);

Route::get('/manageFood', [FoodController::class, 'manageFoodRouter'])->middleware('mdw.admin');
Route::post('/manageFood', [FoodController::class, 'searchFood']);

Route::get('/searchFood', [FoodController::class, 'searchFoodRouter']);
Route::post('/searchFood', [FoodController::class, 'searchFood2']);

Route::get('/createFood', [FoodController::class, 'createFoodRouter'])->middleware('mdw.admin');
Route::post('/createFood', [FoodController::class, 'createNewFood']);

Route::post('/updateProfile', [AuthController::class, 'updateProfile'])->name('update.profile');

Route::get('/updateFood/{id}', [FoodController::class, 'editFoodRouter'])->middleware('mdw.admin');
Route::post('/updateFood/{id}', [FoodController::class, 'updateFood']);

Route::post('/addTransaction', [TransactionController::class, 'addTransaction']);

Route::get('/check-cookie', [AuthController::class, 'checkCookie']);


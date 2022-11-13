<?php

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

Route::get('/', function () {
    return view('pages.login');
});

Route::post('/home', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::get('/checkout', [App\Http\Controllers\ViewController::class, 'checkout']);
Route::get('/product/{id}', [App\Http\Controllers\ProductController::class, 'detail']);
Route::get('/listing', [App\Http\Controllers\TransactionController::class, 'index']);

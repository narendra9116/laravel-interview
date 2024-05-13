<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login-form',[LoginController::class, 'login_form'])->name('login_form');
Route::post('login',[LoginController::class, 'login_check'])->name('login');
Route::get('register-form',[LoginController::class, 'register_form']);
Route::post('register',[LoginController::class, 'register_insert'])->name('register');

Route::get('product-form',[LoginController::class, 'product_form'])->name('product_form');
Route::post('product-insert',[LoginController::class, 'product_insert'])->name('product_insert');
Route::get('show-product',[LoginController::class, 'show_product'])->name('show_product');
Route::get('product-delete/{id}',[LoginController::class, 'product_delete'])->name('product_delete');
Route::get('product-edit/{id}',[LoginController::class, 'product_edit'])->name('product_edit');
Route::post('product-update/{id}',[LoginController::class, 'product_update'])->name('product_update');




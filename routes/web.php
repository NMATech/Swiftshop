<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreateProductController;
use App\Http\Controllers\ControlerUser;
use App\Http\Controllers\authController;

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
    return view('pages.home');
})->name('home');

Route::get('/login', [ControlerUser::class, 'login'])->name('login.page');
Route::post('/login', [authController::class, 'login'])->name('users.login');
Route::get('/register', [ControlerUser::class, 'register']);
Route::post('/regist', [authController::class, 'store'])->name('users.store');
Route::get('/shop', [ControlerUser::class, 'products']);
Route::get('/filter', [ControlerUser::class, 'filter']);
Route::get('/product-{id}', [ControlerUser::class, 'single_product'])->name('product');

Route::get('/admin', function () {
    return view('admin.pages.home');
});

Route::get('/products/create', [CreateProductController::class, 'create'])->name('products.create');
Route::post('/products', [CreateProductController::class, 'store'])->name('products.store');
Route::get('/products', [CreateProductController::class, 'index'])->name('products.index');
Route::get('/products/delete/{id}', [CreateProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id}/edit', [CreateProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [CreateProductController::class, 'update'])->name('products.update');

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

Route::get('/', [ControlerUser::class, 'home'])->name('home');

Route::get('/login', [ControlerUser::class, 'login'])->name('login.page');
Route::post('/login', [authController::class, 'login'])->name('users.login');
Route::get('/logout', [authController::class, 'logout'])->name('users.logout');
Route::get('/register', [ControlerUser::class, 'register']);
Route::post('/regist', [authController::class, 'store'])->name('users.store');
Route::get('/shop', [ControlerUser::class, 'products']);
Route::get('/filter', [ControlerUser::class, 'filter']);
Route::get('/products_{category}', [ControlerUser::class, 'filter2']);
Route::post('/filter', [ControlerUser::class, 'filter']);
Route::get('/product-{id}', [ControlerUser::class, 'single_product'])->name('product');
Route::get('/about_us', [ControlerUser::class, 'about_us'])->name('about_us');
Route::post('/add_to_cart', [ControlerUser::class, 'carts'])->name('cart');
Route::get('/carts', [ControlerUser::class, 'cart'])->name('carts');
Route::get('/delete_cart_{id}', [ControlerUser::class, 'deletecart'])->name('delete_cart');
Route::post('/checkout', [ControlerUser::class, 'checkout'])->name('checkout');
Route::get('/orders', [ControlerUser::class, 'order'])->name('order.page');
Route::post('/update_profile', [ControlerUser::class, 'update_profile'])->name('update.profile');
Route::get('/contact_us', [ControlerUser::class, 'contact_us'])->name('update.profile');
Route::post('/contact', [ControlerUser::class, 'submitContactForm'])->name('contact.submit');

Route::get('/admin', function () {
    return view('admin.pages.home');
});

Route::get('/products/create', [CreateProductController::class, 'create'])->name('products.create');
Route::post('/products', [CreateProductController::class, 'store'])->name('products.store');
Route::get('/products', [CreateProductController::class, 'index'])->name('products.index');
Route::get('/products/delete/{id}', [CreateProductController::class, 'destroy'])->name('products.destroy');
Route::get('/products/{id}/edit', [CreateProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [CreateProductController::class, 'update'])->name('products.update');

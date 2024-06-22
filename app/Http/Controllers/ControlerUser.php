<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class ControlerUser extends Controller
{
    public function register()
    {
        return view('auth.register', ['title' => 'Register']);
    }
    public function login()
    {
        return view('auth.login', ['title' => 'Login']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function registerPost(Request $request)
    {
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $users = new Users([
            'fname' => $validatedData['fname'],
            'lname' => $validatedData['lname'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $users->save();

        return redirect()->route('login.page')->with('success', 'Anda berhasil register.');
    }

    public function products()
    {
        
        $products = Product::all();

        return view('pages.products', ['products' => $products]);
    }

    public function filter(Request $request)
    {
        $category = $request->input('category');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // Query products based on price range
        $products = Product::when($minPrice, function ($query, $minPrice) {
            return $query->where('price', '>=', $minPrice);
        })->when($maxPrice, function ($query, $maxPrice) {
            return $query->where('price', '<=', $maxPrice);
        })->when($category, function ($query, $category) {
            return $query->where('category', $category);
        })->get();

        return view('pages.products', ['products' => $products]);
    }

    public function single_product(string $id)
    {
        $product = Product::find($id);

        $checkStock = [];

        $stock = $product::where('stock', '>', 1)->get();

        if ($stock->isEmpty()) {
            $checkStock['stock'] = 'Stock Empty';
        } else {
            $checkStock['stock'] = 'In Stock';
        }


        return view('pages.single_product', ['product' => $product, 'check' => $checkStock]);
    }
}

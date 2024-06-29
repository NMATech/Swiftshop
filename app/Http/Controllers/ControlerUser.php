<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Users;
use App\Models\cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ControlerUser extends Controller
{

    public function home()
    {
        $user = Auth::user();

        // Get all cart items for the logged-in user
        if ($user) {
            $cartItems = Cart::where('user_id', $user->id)->get();
            return view('pages.home', ['cartItems' => $cartItems]);
        } else {
            return view('pages.home');
        }

    }
    public function register()
    {
        $user = Auth::user();

        if ($user) {
            // Handle case where user is not authenticated
            return redirect()->route('home')->withErrors(['login' => 'Session valid!']);
        }

        return view('auth.register', ['title' => 'Register']);
    }
    public function login()
    {
        $user = Auth::user();

        if ($user) {
            // Handle case where user is not authenticated
            return redirect()->route('home')->withErrors(['login' => 'Session valid!']);
        }

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
        $user = Auth::user();
        $products = Product::all();

        if ($user) {
            // Get all cart items for the logged-in user
            $cartItems = Cart::where('user_id', $user->id)->get();
            return view('pages.products', ['products' => $products, 'cartItems' => $cartItems]);
        } else {
            return view('pages.products', ['products' => $products]);
        }
    }

    public function filter(Request $request)
    {
        $user = Auth::user();

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

        if ($user) {
            // Get all cart items for the logged-in user
            $cartItems = Cart::where('user_id', $user->id)->get();
            return view('pages.products', ['products' => $products, 'cartItems' => $cartItems]);
        } else {
            return view('pages.products', ['products' => $products]);
        }
    }

    public function filter2(string $category)
    {
        $user = Auth::user();

        $kategori = $category;

        $products = Product::when($kategori, function ($query, $kategori) {
            return $query->where('category', $kategori);
        })->get();

        if ($user) {
            // Get all cart items for the logged-in user
            $cartItems = Cart::where('user_id', $user->id)->get();
            return view('pages.products', ['products' => $products, 'cartItems' => $cartItems]);
        } else {
            return view('pages.products', ['products' => $products]);
        }

    }

    public function single_product(string $id)
    {
        $user = Auth::user();

        $product = Product::find($id);

        $checkStock = [];

        $stock = $product::where('stock', '>', 1)->get();

        if ($stock->isEmpty()) {
            $checkStock['stock'] = 'Stock Empty';
        } else {
            $checkStock['stock'] = 'In Stock';
        }

        if ($user) {
            // Get all cart items for the logged-in user
            $cartItems = Cart::where('user_id', $user->id)->get();
            return view('pages.single_product', ['product' => $product, 'check' => $checkStock, 'cartItems' => $cartItems]);
        } else {
            return view('pages.single_product', ['product' => $product, 'check' => $checkStock]);
        }
    }

    public function carts(Request $request)
    {
        $user = Auth::user();

        $user_id = $request->input('user_id');
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');

        if ($user) {
            $cart = new cart([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'quantity' => $quantity
            ]);
            $cart->save();
            return back()->with('success', 'Product has been added to your cart!');
        } else {
            return back()->with('error', 'You should login first!');
        }
    }

    public function cart()
    {
        $user = Auth::user();

        if ($user) {
            // Get all cart items for the logged-in user
            $cartItems = Cart::where('user_id', $user->id)->get();

            // Get all products related to the cart items
            $productIds = $cartItems->pluck('product_id');
            $products = Product::whereIn('id', $productIds)->get();

            // Calculate total quantity
            $totalQuantity = $cartItems->sum('quantity');

            // Calculate total items
            $totalItems = $cartItems->count();

            // Initialize stock status array
            $stockStatus = [];

            // Calculate total price
            $totalPrice = 0;
            foreach ($cartItems as $cartItem) {
                $product = $products->where('id', $cartItem->product_id)->first();
                if ($product) {
                    $totalPrice += $product->price * $cartItem->quantity;

                    // Check stock status
                    $stockStatus[$product->id] = $product->stock > 0 ? 'In Stock' : 'Stock Empty';
                }
            }

            return view('pages.carts', [
                'carts' => $products,
                'quantity' => $totalQuantity,
                'cartItems' => $cartItems,
                'totalItems' => $totalItems,
                'totalPrice' => $totalPrice,
                'stockStatus' => $stockStatus
            ]);
        } else {
            return view('pages.carts');

        }
    }


    public function deletecart(string $id)
    {
        $cartItem = Cart::find($id);

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Product item has been deleted from your carts');
        }

        return redirect()->back()->with('error', "Can't find any product!");
    }

    public function about_us()
    {
        $user = Auth::user();

        if ($user) {
            // Get all cart items for the logged-in user
            $cartItems = Cart::where('user_id', $user->id)->get();

            return view('pages.about_us', ['cartItems' => $cartItems]);
        } else {
            return view('pages.about_us');
        }
    }
}

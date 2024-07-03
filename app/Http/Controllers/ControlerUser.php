<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Users;
use App\Models\cart;
use App\Models\order;
use App\Models\orderItem;
use App\Models\ContactSubmission;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
            return redirect()->back()->with('error', 'You should login first!');
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

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $address = $request->input('address');

        if (!$user) {
            return redirect()->back()->with('error', 'You should login first!');
        } else {
            // Get all cart items for the logged-in user
            $cartItems = Cart::where('user_id', $user->id)->get();

            if ($cartItems->isEmpty()) {
                return redirect()->back()->with('error', 'Your cart is empty.');
            }

            // Get all products related to the cart items
            $productIds = $cartItems->pluck('product_id');
            $products = Product::whereIn('id', $productIds)->get();

            // Create a new order
            $order = order::create([
                'number_order' => uniqid('order_'),
                'user_id' => $user->id,
                'address' => $address, // Assuming user has an address field
            ]);

            // Create order items from cart items
            foreach ($cartItems as $cartItem) {
                $product = $products->where('id', $cartItem->product_id)->first();
                orderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'quantity' => $cartItem->quantity,
                    'price' => $product->price,
                ]);
            }

            // Clear the cart
            Cart::where('user_id', $user->id)->delete();

            return redirect()->back()->with('success', 'Your order has been placed successfully.');
        }

    }

    public function order()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'You should login first!');
        }

        // Get all cart items for the logged-in user
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Get all orders for the logged-in user
        $orderDetails = Order::where('user_id', $user->id)->get();

        $orderItemsList = [];

        foreach ($orderDetails as $order) {
            $orderItems = OrderItem::where('order_id', $order->id)->get();
            foreach ($orderItems as $orderItem) {
                $product = Product::find($orderItem->product_id);
                $orderItemsList[] = [
                    'order' => $order,
                    'orderItem' => $orderItem,
                    'product' => $product
                ];
            }
        }

        return view('pages.order', [
            'orderDetails' => $orderDetails,
            'cartItems' => $cartItems,
            'orderItemsList' => $orderItemsList
        ]);
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            session()->flash('error', 'User not authenticated');
            return response()->json(['success' => false]);
        }

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
        ]);

        $user->fname = $request->input('fname');
        $user->lname = $request->input('lname');
        $user->save();

        session()->flash('success', 'Profile updated successfully');
        return response()->json(['success' => true]);
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

    public function contact_us()
    {
        $user = Auth::user();

        if ($user) {
            // Get all cart items for the logged-in user
            $cartItems = Cart::where('user_id', $user->id)->get();

            return view('pages.contact_us', ['cartItems' => $cartItems]);
        } else {
            return view('pages.contact_us');
        }
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Save to database
        ContactSubmission::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Optionally, send an email
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to('managermamang@gmail.com')
                ->subject('Contact Us Message')
                ->from($request->email, $request->name);
        });

        return redirect()->route('contact.show')->with('success', 'Your message has been sent successfully!');
    }
}

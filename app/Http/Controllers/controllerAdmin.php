<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Product;
use App\Models\order;
use App\Models\orderItem;
use Carbon\Carbon;

class controllerAdmin extends Controller
{
    public function index()
    {
        // Get total number of users
        $totalUsers = Users::count();

        // Get total sales (assuming you have an 'amount' field in the Order model)
        $totalSales = orderItem::sum('price');

        // Get recent activities (e.g., orders placed in the last 7 days)
        $recentOrders = order::where('created_at', '>=', Carbon::now()->subDays(7))->count();

        // Pass the data to the view
        return view('admin.pages.home', compact('totalUsers', 'totalSales', 'recentOrders'));
    }

    public function order(Request $request)
    {
        $query = Order::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        if ($request->has('category')) {
            $category = $request->category;
            $query->whereHas('orderItems.product', function ($q) use ($category) {
                $q->where('category', $category);
            });
        }

        $orders = $query->with('orderItems.product')->get();

        $categories = Product::select('category')->distinct()->get();

        return view('admin.pages.order_admin', [
            'orders' => $orders,
            'categories' => $categories,
        ]);
    }
}

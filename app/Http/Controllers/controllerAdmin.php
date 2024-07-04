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
    public function index(Request $request)
    {
        // Get all users info
        $orderBy = $request->input('orderBy', 'id');

        // Fetch users and order by the selected column
        $users = Users::orderBy($orderBy)->get();

        // Get total number of users
        $totalUsers = Users::count();

        // Get total sales (assuming you have an 'amount' field in the Order model)
        $totalSales = orderItem::sum('price');

        // Get recent activities (e.g., orders placed in the last 7 days)
        $recentOrders = order::where('created_at', '>=', Carbon::now()->subDays(7))->count();

        // Get information is user have ever ordered
        $userOrderCounts = [];
        foreach ($users as $user) {
            $userOrderCounts[$user->id] = Order::where('user_id', $user->id)->count();
        }

        // Pass the data to the view
        return view('admin.pages.home', compact('totalUsers', 'totalSales', 'recentOrders', 'users', 'userOrderCounts'));
    }

    public function order(Request $request)
    {
        // $orders = order::all();
        $orders = Order::with('user')->get();

        return view('admin.pages.order_admin', [
            'orders' => $orders
        ]);
    }
}

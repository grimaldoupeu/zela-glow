<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index', [
            'totalProducts' => Product::count(),
            'totalCategories' => Category::count(),
            'totalOrders' => Order::count(),
            'totalSold' => Order::where('order_status', '!=', 'Cancelado')->sum('total'),
            'pendingOrders' => Order::where('order_status', 'Pendiente')->count(),
            'recentOrders' => Order::latest()->take(6)->get(),
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function sales()
    {
        $orders = Order::withCount('items')->latest()->paginate(12);

        $summary = [
            'totalOrders' => Order::count(),
            'totalSales' => Order::where('order_status', '!=', 'Cancelado')->sum('total'),
            'completedSales' => Order::where('order_status', 'Completado')->sum('total'),
            'simulatedPayments' => Order::where('payment_status', 'Simulado')->count(),
        ];

        $salesByMethod = Order::select('payment_method', DB::raw('COUNT(*) as total_orders'), DB::raw('SUM(total) as total_amount'))
            ->groupBy('payment_method')
            ->orderBy('payment_method')
            ->get();

        return view('admin.reports.sales', compact('orders', 'summary', 'salesByMethod'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::when($request->filled('status'), fn ($query) => $query->where('order_status', $request->status))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.orders.index', [
            'orders' => $orders,
            'statuses' => $this->statuses(),
        ]);
    }

    public function show(Order $order)
    {
        $order->load('items.product');

        return view('admin.orders.show', [
            'order' => $order,
            'statuses' => $this->statuses(),
        ]);
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'order_status' => ['required', 'in:' . implode(',', $this->statuses())],
        ]);

        $order->update($validated);

        return back()->with('success', 'Estado de pedido actualizado.');
    }

    private function statuses(): array
    {
        return ['Pendiente', 'Procesando', 'Enviado', 'Completado', 'Cancelado'];
    }
}

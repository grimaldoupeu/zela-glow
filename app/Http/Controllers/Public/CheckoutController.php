<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Agrega productos antes de continuar.');
        }

        $total = collect($cart)->sum(fn ($item) => $item['price'] * $item['quantity']);

        return view('public.checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'El carrito esta vacio.');
        }

        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:120'],
            'customer_email' => ['required', 'email', 'max:150'],
            'customer_phone' => ['required', 'string', 'max:30'],
            'customer_address' => ['required', 'string', 'max:500'],
            'payment_method' => ['required', 'in:Yape,Plin,Tarjeta demo,Transferencia bancaria,Contra entrega'],
        ]);

        $order = DB::transaction(function () use ($cart, $validated) {
            $total = 0;
            $items = [];

            foreach ($cart as $item) {
                $product = Product::lockForUpdate()->findOrFail($item['product_id']);

                if ($product->status !== 'Activo' || $product->stock < $item['quantity']) {
                    abort(422, 'Stock insuficiente para ' . $product->name);
                }

                $subtotal = (float) $product->price * $item['quantity'];
                $total += $subtotal;
                $items[] = [$product, $item['quantity'], (float) $product->price, $subtotal];
            }

            $order = Order::create($validated + [
                'payment_status' => 'Simulado',
                'order_status' => 'Pendiente',
                'total' => $total,
            ]);

            foreach ($items as [$product, $quantity, $price, $subtotal]) {
                $order->items()->create([
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'subtotal' => $subtotal,
                ]);

                $product->decrement('stock', $quantity);
            }

            return $order;
        });

        session()->forget('cart');

        return redirect()->route('checkout.confirmation', $order);
    }

    public function confirmation(Order $order)
    {
        return view('public.checkout.confirmation', compact('order'));
    }
}

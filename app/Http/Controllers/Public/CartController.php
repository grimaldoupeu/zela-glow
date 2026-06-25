<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('public.cart.index', [
            'cart' => $this->cart(),
            'total' => $this->total(),
        ]);
    }

    public function store(Request $request, Product $product)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . max($product->stock, 1)],
        ]);

        if ($product->status !== 'Activo' || $product->stock < 1) {
            return back()->with('error', 'Producto no disponible.');
        }

        $cart = $this->cart();
        $currentQuantity = $cart[$product->id]['quantity'] ?? 0;
        $newQuantity = min($currentQuantity + (int) $validated['quantity'], $product->stock);

        $cart[$product->id] = [
            'product_id' => $product->id,
            'name' => $product->name,
            'brand' => $product->brand,
            'image' => $product->image,
            'price' => (float) $product->price,
            'stock' => $product->stock,
            'quantity' => $newQuantity,
        ];

        session(['cart' => $cart]);

        return redirect()->route('cart.index')->with('success', 'Producto agregado al carrito.');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'quantities' => ['required', 'array'],
            'quantities.*' => ['required', 'integer', 'min:1'],
        ]);

        $cart = $this->cart();

        foreach ($validated['quantities'] as $productId => $quantity) {
            if (! isset($cart[$productId])) {
                continue;
            }

            $product = Product::find($productId);
            if (! $product || $product->status !== 'Activo') {
                unset($cart[$productId]);
                continue;
            }

            $cart[$productId]['stock'] = $product->stock;
            $cart[$productId]['price'] = (float) $product->price;
            $cart[$productId]['quantity'] = min((int) $quantity, max($product->stock, 1));
        }

        session(['cart' => $cart]);

        return back()->with('success', 'Carrito actualizado.');
    }

    public function destroy(Product $product)
    {
        $cart = $this->cart();
        unset($cart[$product->id]);
        session(['cart' => $cart]);

        return back()->with('success', 'Producto eliminado del carrito.');
    }

    public function clear()
    {
        session()->forget('cart');

        return redirect()->route('cart.index')->with('success', 'Carrito vaciado.');
    }

    private function cart(): array
    {
        return session('cart', []);
    }

    private function total(): float
    {
        return collect($this->cart())->sum(fn ($item) => $item['price'] * $item['quantity']);
    }
}

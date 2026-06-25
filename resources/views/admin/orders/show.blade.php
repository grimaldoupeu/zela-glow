@extends('layouts.admin')

@section('title', 'Pedido #' . $order->id . ' | Zela Glow')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold mb-1">Pedido #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</h1>
        <p class="text-secondary mb-0">{{ $order->created_at->format('d/m/Y H:i') }}</p>
    </div>
    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-dark">Volver</a>
</div>
<div class="row g-4">
    <div class="col-lg-8">
        <div class="admin-card p-4">
            <h4 class="fw-bold mb-3">Productos</h4>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead><tr><th>Producto</th><th>Cantidad</th><th>Precio</th><th>Subtotal</th></tr></thead>
                    <tbody>
                    @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name ?? 'Producto eliminado' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>S/ {{ number_format($item->price, 2) }}</td>
                            <td>S/ {{ number_format($item->subtotal, 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-end fs-4 fw-bold">Total: S/ {{ number_format($order->total, 2) }}</div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="admin-card p-4 mb-4">
            <h4 class="fw-bold">Cliente</h4>
            <p class="mb-1">{{ $order->customer_name }}</p>
            <p class="mb-1">{{ $order->customer_email }}</p>
            <p class="mb-1">{{ $order->customer_phone }}</p>
            <p class="mb-0">{{ $order->customer_address }}</p>
        </div>
        <div class="admin-card p-4">
            <h4 class="fw-bold">Estado</h4>
            <p class="mb-1"><strong>Pago:</strong> {{ $order->payment_status }}</p>
            <p><strong>Metodo:</strong> {{ $order->payment_method }}</p>
            <form method="POST" action="{{ route('admin.orders.status', $order) }}">
                @csrf
                @method('PATCH')
                <label class="form-label">Estado del pedido</label>
                <select name="order_status" class="form-select mb-3">
                    @foreach($statuses as $status)
                        <option value="{{ $status }}" @selected($order->order_status === $status)>{{ $status }}</option>
                    @endforeach
                </select>
                <button class="btn btn-glow w-100">Actualizar estado</button>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Pedidos | Zela Glow')

@section('content')
<div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
    <h1 class="fw-bold mb-0">Pedidos</h1>
    <form method="GET" class="d-flex gap-2">
        <select name="status" class="form-select">
            <option value="">Todos</option>
            @foreach($statuses as $status)
                <option value="{{ $status }}" @selected(request('status') === $status)>{{ $status }}</option>
            @endforeach
        </select>
        <button class="btn btn-outline-dark">Filtrar</button>
    </form>
</div>
<div class="admin-card p-3">
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Pedido</th><th>Cliente</th><th>Pago</th><th>Estado pago</th><th>Estado pedido</th><th>Total</th><th></th></tr></thead>
            <tbody>
            @forelse($orders as $order)
                <tr>
                    <td>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $order->customer_name }}<div class="small text-secondary">{{ $order->customer_email }}</div></td>
                    <td>{{ $order->payment_method }}</td>
                    <td><span class="badge text-bg-info">{{ $order->payment_status }}</span></td>
                    <td><span class="badge text-bg-light">{{ $order->order_status }}</span></td>
                    <td>S/ {{ number_format($order->total, 2) }}</td>
                    <td><a class="btn btn-sm btn-outline-dark" href="{{ route('admin.orders.show', $order) }}">Gestionar</a></td>
                </tr>
            @empty
                <tr><td colspan="7" class="text-center text-secondary">No hay pedidos registrados.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    {{ $orders->links() }}
</div>
@endsection

@extends('layouts.admin')

@section('title', 'Dashboard | Zela Glow')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="fw-bold mb-1">Dashboard</h1>
        <p class="text-secondary mb-0">Resumen general de la tienda academica.</p>
    </div>
</div>
<div class="row g-3 mb-4">
    @foreach([
        ['Total productos', $totalProducts, 'bi-bag-heart'],
        ['Total categorias', $totalCategories, 'bi-tags'],
        ['Total pedidos', $totalOrders, 'bi-receipt'],
        ['Total vendido', 'S/ ' . number_format($totalSold, 2), 'bi-cash-stack'],
        ['Pedidos pendientes', $pendingOrders, 'bi-hourglass-split'],
    ] as [$label, $value, $icon])
        <div class="col-md-6 col-xl">
            <div class="stat-card p-3 h-100">
                <div class="text-secondary"><i class="bi {{ $icon }}"></i> {{ $label }}</div>
                <div class="fs-3 fw-bold">{{ $value }}</div>
            </div>
        </div>
    @endforeach
</div>
<div class="admin-card p-4">
    <h4 class="fw-bold mb-3">Pedidos recientes</h4>
    <div class="table-responsive">
        <table class="table align-middle">
            <thead><tr><th>Pedido</th><th>Cliente</th><th>Metodo</th><th>Estado</th><th>Total</th><th></th></tr></thead>
            <tbody>
            @forelse($recentOrders as $order)
                <tr>
                    <td>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                    <td>{{ $order->customer_name }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td><span class="badge text-bg-light">{{ $order->order_status }}</span></td>
                    <td>S/ {{ number_format($order->total, 2) }}</td>
                    <td><a class="btn btn-sm btn-outline-dark" href="{{ route('admin.orders.show', $order) }}">Ver</a></td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-secondary">Aun no hay pedidos.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

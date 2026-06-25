@extends('layouts.admin')

@section('title', 'Reporte ventas | Zela Glow')

@section('content')
<h1 class="fw-bold mb-4">Reporte simple de ventas</h1>
<div class="row g-3 mb-4">
    @foreach([
        ['Pedidos', $summary['totalOrders']],
        ['Total vendido', 'S/ ' . number_format($summary['totalSales'], 2)],
        ['Ventas completadas', 'S/ ' . number_format($summary['completedSales'], 2)],
        ['Pagos simulados', $summary['simulatedPayments']],
    ] as [$label, $value])
        <div class="col-md-3">
            <div class="stat-card p-3">
                <div class="text-secondary">{{ $label }}</div>
                <div class="fs-3 fw-bold">{{ $value }}</div>
            </div>
        </div>
    @endforeach
</div>
<div class="row g-4">
    <div class="col-lg-5">
        <div class="admin-card p-4">
            <h4 class="fw-bold mb-3">Ventas por metodo</h4>
            <table class="table">
                <thead><tr><th>Metodo</th><th>Pedidos</th><th>Total</th></tr></thead>
                <tbody>
                @foreach($salesByMethod as $row)
                    <tr>
                        <td>{{ $row->payment_method }}</td>
                        <td>{{ $row->total_orders }}</td>
                        <td>S/ {{ number_format($row->total_amount, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="admin-card p-4">
            <h4 class="fw-bold mb-3">Pedidos registrados</h4>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead><tr><th>Pedido</th><th>Items</th><th>Estado</th><th>Total</th></tr></thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>#{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $order->items_count }}</td>
                            <td>{{ $order->order_status }}</td>
                            <td>S/ {{ number_format($order->total, 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{ $orders->links() }}
        </div>
    </div>
</div>
@endsection

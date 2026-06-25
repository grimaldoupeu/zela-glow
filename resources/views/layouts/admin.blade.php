<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Zela Glow')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #f7f1f4; color: #261920; font-family: "Segoe UI", system-ui, sans-serif; }
        .admin-shell { min-height: 100vh; }
        .sidebar { background: #24191f; color: #fff; }
        .sidebar a { color: #f7d8e2; text-decoration: none; display: block; padding: .75rem 1rem; border-radius: 8px; }
        .sidebar a:hover, .sidebar a.active { background: #d63384; color: #fff; }
        .stat-card, .admin-card { background: #fff; border: 1px solid #eed8df; border-radius: 8px; box-shadow: 0 12px 26px rgba(80, 46, 61, .06); }
        .btn-glow { background: #d63384; border-color: #d63384; color: #fff; }
        .btn-glow:hover { background: #b9236c; border-color: #b9236c; color: #fff; }
        .table img { width: 58px; height: 58px; object-fit: cover; border-radius: 8px; }
    </style>
</head>
<body>
<div class="admin-shell d-lg-flex">
    <aside class="sidebar p-3 col-lg-2">
        <div class="fw-bold fs-5 mb-4">Zela Glow Admin</div>
        <nav class="d-grid gap-1">
            <a href="{{ route('admin.dashboard') }}"><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="{{ route('admin.categories.index') }}"><i class="bi bi-tags"></i> Categorias</a>
            <a href="{{ route('admin.products.index') }}"><i class="bi bi-bag-heart"></i> Productos</a>
            <a href="{{ route('admin.orders.index') }}"><i class="bi bi-receipt"></i> Pedidos</a>
            <a href="{{ route('admin.reports.sales') }}"><i class="bi bi-graph-up"></i> Reporte ventas</a>
            <a href="{{ route('home') }}"><i class="bi bi-shop"></i> Ver tienda</a>
        </nav>
        <form method="POST" action="{{ route('admin.logout') }}" class="mt-4">
            @csrf
            <button class="btn btn-outline-light btn-sm w-100">Cerrar sesion</button>
        </form>
    </aside>
    <section class="flex-grow-1 p-3 p-lg-4">
        @include('partials.alerts')
        @yield('content')
    </section>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

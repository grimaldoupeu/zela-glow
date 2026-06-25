<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Zela Glow')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --zg-pink: #f8b7ca;
            --zg-fuchsia: #d63384;
            --zg-cream: #fff7ef;
            --zg-ink: #24191f;
            --zg-soft: #7c6770;
        }
        body { font-family: "Segoe UI", system-ui, sans-serif; color: var(--zg-ink); background: #fffaf7; }
        .navbar { background: rgba(255, 250, 247, .96); backdrop-filter: blur(12px); border-bottom: 1px solid #f2d7df; }
        .brand-mark { width: 38px; height: 38px; display: inline-grid; place-items: center; border-radius: 50%; background: var(--zg-fuchsia); color: #fff; font-weight: 800; }
        .hero { background: linear-gradient(120deg, rgba(255, 247, 239, .9), rgba(248, 183, 202, .65)), url("https://images.unsplash.com/photo-1522335789203-aabd1fc54bc9?auto=format&fit=crop&w=1600&q=80") center/cover; min-height: 520px; display: flex; align-items: center; }
        .btn-glow { background: var(--zg-fuchsia); border-color: var(--zg-fuchsia); color: #fff; }
        .btn-glow:hover { background: #b9236c; border-color: #b9236c; color: #fff; }
        .btn-outline-glow { border-color: var(--zg-fuchsia); color: var(--zg-fuchsia); }
        .btn-outline-glow:hover { background: var(--zg-fuchsia); color: #fff; }
        .section-title { font-weight: 800; color: var(--zg-ink); }
        .product-card { border: 1px solid #f0d7df; border-radius: 8px; overflow: hidden; height: 100%; background: #fff; transition: transform .2s, box-shadow .2s; }
        .product-card:hover { transform: translateY(-3px); box-shadow: 0 16px 36px rgba(214, 51, 132, .13); }
        .product-img { width: 100%; height: 230px; object-fit: cover; background: #f8e6ec; }
        .badge-soft { background: #fde8f0; color: #a01859; }
        .price { color: var(--zg-fuchsia); font-weight: 800; }
        .promo-band { background: #24191f; color: #fff; }
        .footer { background: #1f171b; color: #fceaf0; }
        .form-control:focus, .form-select:focus { border-color: var(--zg-fuchsia); box-shadow: 0 0 0 .2rem rgba(214, 51, 132, .18); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="{{ route('home') }}">
                <span class="brand-mark">ZG</span> Zela Glow
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Catalogo</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">Nosotros</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contacto</a></li>
                    <li class="nav-item">
                        <a class="btn btn-outline-glow btn-sm" href="{{ route('cart.index') }}">
                            <i class="bi bi-bag-heart"></i> Carrito
                            @if(count(session('cart', [])) > 0)
                                <span class="badge text-bg-dark">{{ count(session('cart', [])) }}</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link small" href="{{ route('admin.login') }}">Admin</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        @include('partials.alerts')
        @yield('content')
    </main>

    <footer class="footer py-5 mt-5">
        <div class="container d-flex flex-column flex-md-row justify-content-between gap-3">
            <div>
                <h5 class="fw-bold mb-2">Zela Glow</h5>
                <p class="mb-0 text-white-50">Tienda academica de cosmeticos con pagos simulados.</p>
            </div>
            <div>
                <p class="mb-1"><i class="bi bi-envelope"></i> beyri.zm@gmail.com</p>
                <p class="mb-0 text-white-50">Laravel 10 + Blade + Bootstrap 5</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

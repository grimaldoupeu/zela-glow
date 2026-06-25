<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | Zela Glow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; display: grid; place-items: center; background: linear-gradient(120deg, #fff7ef, #f8b7ca); font-family: "Segoe UI", system-ui, sans-serif; }
        .login-card { width: min(430px, 92vw); border-radius: 8px; border: 1px solid #efd4dd; background: #fff; box-shadow: 0 24px 60px rgba(214, 51, 132, .18); }
        .btn-glow { background: #d63384; border-color: #d63384; color: #fff; }
    </style>
</head>
<body>
    <div class="login-card p-4">
        <h1 class="h3 fw-bold text-center mb-1">Zela Glow</h1>
        <p class="text-secondary text-center mb-4">Acceso administrador</p>
        @include('partials.alerts')
        <form method="POST" action="{{ route('admin.login.store') }}">
            @csrf
            <label class="form-label">Correo</label>
            <input type="email" name="email" value="{{ old('email', 'beyri.zm@gmail.com') }}" class="form-control mb-3" required autofocus>
            <label class="form-label">Contrasena</label>
            <input type="password" name="password" class="form-control mb-4" required>
            <button class="btn btn-glow w-100">Ingresar</button>
        </form>
        <a href="{{ route('home') }}" class="d-block text-center text-secondary mt-3">Volver a la tienda</a>
    </div>
</body>
</html>

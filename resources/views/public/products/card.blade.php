<div class="product-card">
    <img class="product-img" src="{{ $product->image ?: 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?auto=format&fit=crop&w=900&q=80' }}" alt="{{ $product->name }}">
    <div class="p-3">
        <div class="d-flex justify-content-between gap-2 mb-2">
            <span class="badge badge-soft">{{ $product->category->name ?? 'Sin categoria' }}</span>
            <span class="small text-secondary">Stock {{ $product->stock }}</span>
        </div>
        <h5 class="fw-bold mb-1">{{ $product->name }}</h5>
        <p class="small text-secondary mb-2">{{ $product->brand }}</p>
        <div class="d-flex justify-content-between align-items-center mb-3">
            <span class="price">S/ {{ number_format($product->price, 2) }}</span>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('products.show', $product) }}" class="btn btn-outline-dark btn-sm flex-fill">Ver detalle</a>
            <form method="POST" action="{{ route('cart.store', $product) }}" class="flex-fill">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button class="btn btn-glow btn-sm w-100" @disabled($product->stock < 1)>Agregar</button>
            </form>
        </div>
    </div>
</div>

@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1>{{ $producto->nombre }}</h1>
        <p class="text-muted">{{ $producto->categoria->nombre }} · {{ $producto->franquicia }}</p>
        <p>{{ $producto->descripcion }}</p>

        @if($producto->en_promocion)
            <p>
                <span class="text-muted text-decoration-line-through">${{ number_format($producto->precio, 2) }}</span>
                <span class="badge bg-success">-10% Promoción</span>
            </p>
            <h3 class="text-danger">${{ number_format($producto->precio_final, 2) }}</h3>
        @else
            <h3>${{ number_format($producto->precio, 2) }}</h3>
        @endif

        @if($producto->stock > 0)
            <form method="POST" action="{{ route('carrito.add') }}">
                @csrf
                <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                <div class="mb-3">
                    <label class="form-label">Cantidad</label>
                    <input type="number" name="cantidad" class="form-control" min="1" max="{{ $producto->stock }}" value="1">
                </div>
                <button type="submit" class="btn btn-primary">Agregar al carrito</button>
            </form>
        @else
            <div class="alert alert-danger">Producto agotado</div>
        @endif
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<h1 class="mb-4">Carrito de compras</h1>

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if(empty($productos))
    <div class="alert alert-info">Tu carrito está vacío. <a href="{{ route('productos.index') }}">Ir al catálogo</a></div>
@else
    <form method="POST" action="{{ route('carrito.update') }}">
        @csrf
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $item)
                    <tr>
                        <td>{{ $item['producto']->nombre }}</td>
                        <td>${{ number_format($item['producto']->precio_final, 2) }}</td>
                        <td>
                            <input type="number" name="cantidades[{{ $item['producto']->id }}]" class="form-control" style="width: 80px" min="1" max="{{ $item['producto']->stock }}" value="{{ $item['cantidad'] }}">
                        </td>
                        <td>${{ number_format($item['subtotal'], 2) }}</td>
                        <td>
                            <form action="{{ route('carrito.remove', $item['producto']->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">✕</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-between align-items-center">
            <h4>Total: ${{ number_format($total,2) }}</h4>
            <div>
                <button type="submit" class="btn btn-secondary">Actualizar carrito</button>
                <a href="{{ route('carrito.checkout') }}" class="btn btn-primary">Proceder al checkout</a>
            </div>
        </div>
    </form>
@endif
@endsection

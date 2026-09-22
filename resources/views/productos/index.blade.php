@extends('layouts.app')

@section('content')
<h1 class="mb-4">Catálogo de productos</h1>

{{-- Filtros --}}
<form method="GET" action="{{ route('productos.index') }}" class="row g-3 mb-4">
    <div class="col-md-4">
        <input type="text" name="nombre" class="form-control" placeholder="Buscar por nombre" value="{{ request('nombre') }}">
    </div>
    <div class="col-md-3">
        <select name="categoria" class="form-select">
            <option value="">Todas las categorías</option>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <select name="franquicia" class="form-select">
            <option value="">Todas las franquicias</option>
            @foreach($franquicias as $franquicia)
                <option value="{{ $franquicia }}" {{ request('franquicia') == $franquicia ? 'selected' : '' }}>
                    {{ $franquicia }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Filtrar</button>
    </div>
</form>

{{-- Grid de productos --}}
<div class="row">
    @forelse($productos as $producto)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $producto->nombre }}</h5>
                    <h6 class="text-muted">{{ $producto->categoria->nombre }} · {{ $producto->franquicia }}</h6>

                    @if($producto->en_promocion)
                        <p class="mb-1">
                            <span class="text-muted text-decoration-line-through">${{ number_format($producto->precio, 2) }}</span>
                            <span class="badge bg-success">-10%</span>
                        </p>
                        <h4 class="text-danger">${{ number_format($producto->precio_final, 2) }}</h4>
                    @else
                        <h4>${{ number_format($producto->precio, 2) }}</h4>
                    @endif

                    <p class="text-muted">
                        Stock: {{ $producto->stock }}
                        @if($producto->stock == 0)
                            <span class="badge bg-danger">Agotado</span>
                        @endif
                    </p>

                    <a href="{{ route('productos.show', $producto) }}" class="btn btn-outline-primary">Ver detalles</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">No se encontraron productos.</div>
        </div>
    @endforelse
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Gestión de productos</h1>
    <a href="{{ route('productos.create') }}" class="btn btn-success">+ Nuevo producto</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Franquicia</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
            <tr>
                <td>{{ $producto->id }}</td>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->categoria->nombre }}</td>
                <td>{{ $producto->franquicia }}</td>
                <td>${{ number_format($producto->precio, 2) }}</td>
                <td>{{ $producto->stock }}</td>
                <td>
                    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

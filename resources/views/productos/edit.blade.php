@extends('layouts.app')

@section('content')
<h1>Editar producto</h1>

<form method="POST" action="{{ route('productos.update', $producto) }}">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3" required>{{ $producto->descripcion }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Categoría</label>
        <select name="categoria_id" class="form-select" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Franquicia</label>
        <input type="text" name="franquicia" class="form-control" value="{{ $producto->franquicia }}" required>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Precio</label>
            <input type="number" name="precio" class="form-control" step="0.01" min="0" value="{{ $producto->precio }}" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" min="0" value="{{ $producto->stock }}" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
    <a href="{{ route('productos.admin') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

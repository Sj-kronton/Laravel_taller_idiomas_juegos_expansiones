@extends('layouts.app')

@section('content')
<h1>Nuevo producto</h1>

<form method="POST" action="{{ route('productos.store') }}">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea name="descripcion" class="form-control" rows="3" required></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Categoría</label>
        <select name="categoria_id" class="form-select" required>
            @foreach($categorias as $categoria)
                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Franquicia</label>
        <input type="text" name="franquicia" class="form-control" required>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Precio</label>
            <input type="number" name="precio" class="form-control" step="0.01" min="0" required>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Stock</label>
            <input type="number" name="stock" class="form-control" min="0" required>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('productos.admin') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

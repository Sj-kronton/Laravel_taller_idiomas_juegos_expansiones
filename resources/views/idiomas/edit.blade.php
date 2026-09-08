<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar idioma</title>
</head>
<body>
    @include('partials.menu')

    <h1>Editar idioma</h1>

    <form action="/idiomas/{{ $idioma->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="{{ $idioma->nombre }}" required>
        </div>

        <div>
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" value="{{ $idioma->codigo }}" required maxlength="5">
        </div>

        <button type="submit">Actualizar idioma</button>
    </form>
</body>
</html>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar juego</title>
</head>
<body>
    @include('partials.menu')

    <h1>Editar juego</h1>

    <form action="/juegos/{{ $juego->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="{{ $juego->titulo }}" required>
        </div>

        <div>
            <label for="anio">Año:</label>
            <input type="number" id="anio" name="anio" value="{{ $juego->anio }}" required>
        </div>

        <div>
            <label for="idioma_id">Idioma:</label>
            <select id="idioma_id" name="idioma_id" required>
                @foreach ($idiomas as $idioma)
                    <option value="{{ $idioma->id }}" {{ $idioma->id == $juego->idioma_id ? 'selected' : '' }}>{{ $idioma->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Actualizar juego</button>
    </form>
</body>
</html>

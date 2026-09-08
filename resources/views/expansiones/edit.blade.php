<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar expansión</title>
</head>
<body>
    @include('partials.menu')

    <h1>Editar expansión</h1>

    <form action="/expansiones/{{ $expansion->id }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" value="{{ $expansion->titulo }}" required>
        </div>

        <div>
            <label for="juego_id">Juego base:</label>
            <select id="juego_id" name="juego_id" required>
                @foreach ($juegos as $juego)
                    <option value="{{ $juego->id }}" {{ $juego->id == $expansion->juego_id ? 'selected' : '' }}>{{ $juego->titulo }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="idioma_id">Idioma:</label>
            <select id="idioma_id" name="idioma_id" required>
                @foreach ($idiomas as $idioma)
                    <option value="{{ $idioma->id }}" {{ $idioma->id == $expansion->idioma_id ? 'selected' : '' }}>{{ $idioma->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit">Actualizar expansión</button>
    </form>
</body>
</html>

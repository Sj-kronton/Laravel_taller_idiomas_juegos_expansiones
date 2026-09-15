<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Búsqueda avanzada de juegos</title>
</head>
<body>
    @include('partials.menu')

    <h1>Búsqueda avanzada</h1>

    <form action="{{ url('/juegos/buscar') }}" method="GET">
        <div>
            <label for="nombre">Nombre del juego o expansión:</label>
            <input type="search" id="nombre" name="nombre" value="{{ $filtros['nombre'] ?? '' }}">
        </div>

        <div>
            <label for="anio_desde">Año desde:</label>
            <input type="number" id="anio_desde" name="anio_desde" value="{{ $filtros['anio_desde'] ?? '' }}">
        </div>

        <div>
            <label for="anio_hasta">Año hasta:</label>
            <input type="number" id="anio_hasta" name="anio_hasta" value="{{ $filtros['anio_hasta'] ?? '' }}">
        </div>

        <div>
            <label for="idioma_id">Idioma:</label>
            <select id="idioma_id" name="idioma_id">
                <option value="">Todos los idiomas</option>
                @foreach ($idiomas as $idioma)
                    <option value="{{ $idioma->id }}" @selected(($filtros['idioma_id'] ?? '') == $idioma->id)>
                        {{ $idioma->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Buscar</button>
        <a href="{{ url('/juegos/buscar') }}">Limpiar</a>
    </form>

    <h2>Juegos ({{ $juegos->count() }})</h2>
    @if ($juegos->isNotEmpty())
        <ul>
            @foreach ($juegos as $juego)
                <li>
                    <a href="{{ url('/juegos/' . $juego->id) }}">{{ $juego->titulo }}</a>
                    - {{ $juego->anio }} - {{ $juego->idioma->nombre }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No se encontraron juegos con esos criterios.</p>
    @endif

    <h2>Expansiones ({{ $expansiones->count() }})</h2>
    @if ($expansiones->isNotEmpty())
        <ul>
            @foreach ($expansiones as $expansion)
                <li>
                    <a href="{{ url('/expansiones/' . $expansion->id) }}">{{ $expansion->titulo }}</a>
                    - Juego base: {{ $expansion->juego->titulo }}
                    - {{ $expansion->juego->anio }} - {{ $expansion->idioma->nombre }}
                </li>
            @endforeach
        </ul>
    @else
        <p>No se encontraron expansiones con esos criterios.</p>
    @endif
</body>
</html>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de juegos</title>
</head>
<body>
    @include('partials.menu')

    <h1>Listado de juegos</h1>

    @if (count($juegos) > 0)
        <ul>
            @foreach ($juegos as $juego)
                <li>{{ $juego->titulo }} - {{ $juego->anio }} - {{ $juego->idioma->nombre }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay juegos registrados.</p>
    @endif
</body>
</html>

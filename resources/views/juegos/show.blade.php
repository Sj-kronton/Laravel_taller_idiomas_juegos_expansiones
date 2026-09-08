<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de juego</title>
</head>
<body>
    @include('partials.menu')

    <h1>Detalle de juego</h1>

    <p><strong>ID:</strong> {{ $juego->id }}</p>
    <p><strong>Título:</strong> {{ $juego->titulo }}</p>
    <p><strong>Año:</strong> {{ $juego->anio }}</p>
    <p><strong>Idioma:</strong> {{ $juego->idioma }}</p>

    <a href="/juegos">Volver al listado</a>
</body>
</html>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de expansión</title>
</head>
<body>
    @include('partials.menu')

    <h1>Detalle de expansión</h1>

    <p><strong>ID:</strong> {{ $expansion->id }}</p>
    <p><strong>Título:</strong> {{ $expansion->titulo }}</p>
    <p><strong>Juego base:</strong> {{ $expansion->juego_base }}</p>
    <p><strong>Idioma:</strong> {{ $expansion->idioma }}</p>

    <a href="/expansiones">Volver al listado</a>
</body>
</html>

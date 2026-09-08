<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de idioma</title>
</head>
<body>
    @include('partials.menu')

    <h1>Detalle de idioma</h1>

    <p><strong>ID:</strong> {{ $idioma->id }}</p>
    <p><strong>Nombre:</strong> {{ $idioma->nombre }}</p>
    <p><strong>Código:</strong> {{ $idioma->codigo }}</p>

    <a href="/idiomas">Volver al listado</a>
</body>
</html>

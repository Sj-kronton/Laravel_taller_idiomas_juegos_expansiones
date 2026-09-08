<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    @include('partials.menu')

    <h1>{{ $mensaje }}</h1>
    <p>Operación de expansión: {{ $operacion }}</p>
    <a href="/expansiones">Volver al listado</a>
</body>
</html>

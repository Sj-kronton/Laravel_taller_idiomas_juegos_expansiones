<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idiomas</title>
</head>
<body>
    @include('partials.menu')

    <h1>Listado de idiomas</h1>

    @if (count($idiomas) > 0)
        <ul>
            @foreach ($idiomas as $idioma)
                <li>{{ $idioma->nombre }} - {{ $idioma->codigo }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay idiomas registrados.</p>
    @endif
</body>
</html>

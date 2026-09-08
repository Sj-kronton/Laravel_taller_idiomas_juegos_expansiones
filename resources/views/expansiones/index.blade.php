<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de expansiones</title>
</head>
<body>
    @include('partials.menu')

    <h1>Listado de expansiones</h1>

    @if (count($expansiones) > 0)
        <ul>
            @foreach ($expansiones as $expansion)
                <li>{{ $expansion->titulo }} - {{ $expansion->juego_base }} - {{ $expansion->idioma }}</li>
            @endforeach
        </ul>
    @else
        <p>No hay expansiones registradas.</p>
    @endif
</body>
</html>

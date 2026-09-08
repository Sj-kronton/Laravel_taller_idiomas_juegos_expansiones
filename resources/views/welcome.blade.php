<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    @include('partials.menu')

    <h1>Panel principal</h1>
    <p>Bienvenido a la aplicación de idiomas, juegos y expansiones.</p>

    <nav>
        <h2>Idiomas</h2>
        <ul>
            <li><a href="/idiomas">Listado de idiomas</a></li>
            <li><a href="/idiomas/create">Crear idioma</a></li>
        </ul>

        <h2>Juegos</h2>
        <ul>
            <li><a href="/juegos">Listado de juegos</a></li>
            <li><a href="/juegos/create">Crear juego</a></li>
        </ul>

        <h2>Expansiones</h2>
        <ul>
            <li><a href="/expansiones">Listado de expansiones</a></li>
            <li><a href="/expansiones/create">Crear expansión</a></li>
        </ul>
    </nav>
</body>
</html>

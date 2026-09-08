<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar idioma</title>
</head>
<body>
    @include('partials.menu')

    <h1>Registrar idioma</h1>

    <form action="/idiomas" method="POST">
        @csrf

        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>

        <div>
            <label for="codigo">Código:</label>
            <input type="text" id="codigo" name="codigo" required maxlength="5">
        </div>

        <button type="submit">Guardar idioma</button>
    </form>
</body>
</html>

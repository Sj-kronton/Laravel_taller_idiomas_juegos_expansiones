# Portal de Idiomas, Juegos y Expansiones

Aplicación web desarrollada con Laravel para gestionar un catálogo de idiomas, juegos y expansiones. El proyecto permite registrar, listar, consultar, editar y eliminar registros de cada entidad, además de navegar entre las vistas principales desde una página de inicio temática.

## Temática

La aplicación funciona como una pequeña base de datos editorial y lúdica dedicada al mundo de los videojuegos y los idiomas. Cada juego está relacionado con un idioma base, y cada expansión puede estar vinculada a un juego concreto.

## Entidades principales

- Idiomas: catálogo de idiomas disponibles en el sistema.
- Juegos: registros de títulos con año y relación al idioma de origen.
- Expansiones: extensiones o paquetes complementarios de un juego.

## Funcionalidades

- Listado de idiomas, juegos y expansiones.
- Formularios de creación y edición.
- Vistas de detalle para cada recurso.
- Resultado de operaciones de guardado, actualización y eliminación.
- Menú principal de navegación entre recursos.
- Página de bienvenida con acceso a las distintas entidades.

## Tecnologías

- PHP 8.3
- Laravel 13
- Blade templates
- Laravel Sail
- Query Builder con base de datos

## Instalación

1. Clona el repositorio.
2. Instala dependencias con Composer:

```bash
composer install
```

3. Copia el archivo de entorno:

```bash
cp .env.example .env
```

4. Genera la clave de la aplicación:

```bash
php artisan key:generate
```

5. Ejecuta las migraciones:

```bash
php artisan migrate
```

6. Inicia el servidor local:

```bash
php artisan serve
```

## Rutas principales

La aplicación expone rutas para consultar y gestionar cada recurso:

```text
/idiomas
/idiomas/create
/idiomas/{id}
/idiomas/{id}/edit

/juegos
/juegos/create
/juegos/{id}
/juegos/{id}/edit

/expansiones
/expansiones/create
/expansiones/{id}
/expansiones/{id}/edit
```

## Estructura de trabajo

El proyecto organiza la lógica por controladores, modelos y vistas Blade para cada recurso:

- app/Http/Controllers/
- app/Models/
- resources/views/
- routes/web.php

## Estado

Proyecto de práctica y aprendizaje para construir una aplicación Laravel con CRUD, vistas de recursos y navegación temática entre idiomas, juegos y expansiones.

## Licencia

Este proyecto se distribuye bajo la licencia MIT.

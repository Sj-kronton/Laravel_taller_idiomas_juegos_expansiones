<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Idioma;
use App\Models\Expansion;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    // READ (Todos con JOIN de Idioma)
    public function index()
    {
        $juegos = Juego::with('idioma')->get();

        return view('juegos.index', compact('juegos'));
    }

    // READ (Uno)
    public function show($id)
    {
        $juego = Juego::with(['idioma', 'expansiones'])->findOrFail($id);

        return view('juegos.show', compact('juego'));
    }

    // CREATE
    public function store(Request $request)
    {
        Juego::create($request->validate([
            'titulo' => ['required', 'string', 'max:100'],
            'anio' => ['required', 'integer'],
            'idioma_id' => ['required', 'exists:idiomas,id'],
        ]));

        return view('juegos.result', [
            'mensaje' => 'Juego creado correctamente',
            'operacion' => 'guardado'
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $juego = Juego::findOrFail($id);
        $juego->update($request->validate([
            'titulo' => ['required', 'string', 'max:100'],
            'anio' => ['required', 'integer'],
            'idioma_id' => ['required', 'exists:idiomas,id'],
        ]));

        return view('juegos.result', [
            'mensaje' => 'Juego actualizado correctamente',
            'operacion' => 'actualizado'
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        Juego::findOrFail($id)->delete();

        return view('juegos.result', [
            'mensaje' => 'Juego borrado correctamente',
            'operacion' => 'borrado'
        ]);
    }

    public function create()
    {
        $idiomas = Idioma::all();
        return view('juegos.create', compact('idiomas'));
    }

    public function edit($id)
    {
        $juego = Juego::findOrFail($id);

        $idiomas = Idioma::all();

        return view('juegos.edit', compact('juego', 'idiomas'));
    }

    public function search(Request $request)
    {
        $filtros = $request->validate([
            'nombre' => ['nullable', 'string', 'max:100'],
            'anio_desde' => ['nullable', 'integer'],
            'anio_hasta' => ['nullable', 'integer', 'gte:anio_desde'],
            'idioma_id' => ['nullable', 'exists:idiomas,id'],
        ]);

        $nombre = trim($filtros['nombre'] ?? '');
        $juegos = Juego::with('idioma')
            ->when($nombre !== '', fn ($query) => $query->where('titulo', 'like', "%{$nombre}%"))
            ->when(isset($filtros['anio_desde']), fn ($query) => $query->where('anio', '>=', $filtros['anio_desde']))
            ->when(isset($filtros['anio_hasta']), fn ($query) => $query->where('anio', '<=', $filtros['anio_hasta']))
            ->when(isset($filtros['idioma_id']), fn ($query) => $query->where('idioma_id', $filtros['idioma_id']))
            ->orderBy('titulo')
            ->get();

        $expansiones = Expansion::with(['juego', 'idioma'])
            ->when($nombre !== '', fn ($query) => $query->where('titulo', 'like', "%{$nombre}%"))
            ->when(isset($filtros['anio_desde']), fn ($query) => $query->whereHas('juego', fn ($juego) => $juego->where('anio', '>=', $filtros['anio_desde'])))
            ->when(isset($filtros['anio_hasta']), fn ($query) => $query->whereHas('juego', fn ($juego) => $juego->where('anio', '<=', $filtros['anio_hasta'])))
            ->when(isset($filtros['idioma_id']), fn ($query) => $query->where('idioma_id', $filtros['idioma_id']))
            ->orderBy('titulo')
            ->get();

        $idiomas = Idioma::orderBy('nombre')->get();

        return view('juegos.search', compact('juegos', 'expansiones', 'idiomas', 'filtros'));
    }
}
?>

<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Idioma;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    // READ (Todos con JOIN de Idioma)
    public function index()
    {
        $juegos = Juego::all();

        return view('juegos.index', compact('juegos'));
    }

    // READ (Uno)
    public function show($id)
    {
        $juego = Juego::find($id);

        // Si no existe el juego, devolvemos un 404
        if (!$juego) {
            abort(404, 'Juego no encontrado');
        }

        return view('juegos.show', compact('juego'));
    }

    // CREATE
    public function store(Request $request)
    {
        Juego::create($request->only(['titulo', 'anio', 'idioma_id']));

        return view('juegos.result', [
            'mensaje' => 'Juego creado correctamente',
            'operacion' => 'guardado'
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        Juego::update($id, $request->only(['titulo', 'anio', 'idioma_id']));

        return view('juegos.result', [
            'mensaje' => 'Juego actualizado correctamente',
            'operacion' => 'actualizado'
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        Juego::destroy($id);

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
        $juego = Juego::find($id);

        if (!$juego) {
            abort(404, 'Juego no encontrado');
        }

        $idiomas = Idioma::all();

        return view('juegos.edit', compact('juego', 'idiomas'));
    }
}
?>

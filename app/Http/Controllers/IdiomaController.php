<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    // READ (Todos)
    public function index()
    {
        $idiomas = Idioma::all();

        return view('idiomas.index', compact('idiomas'));
    }

    // READ (Uno)
    public function show($id)
    {
        $idioma = Idioma::find($id);

        if (!$idioma) {
            abort(404, 'Idioma no encontrado');
        }

        return view('idiomas.show', compact('idioma'));
    }

    // CREATE
    public function store(Request $request)
    {
        Idioma::create($request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'codigo' => ['required', 'string', 'max:10'],
        ]));

        return view('idiomas.result', [
            'mensaje' => 'Idioma creado correctamente',
            'operacion' => 'guardado'
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $idioma = Idioma::findOrFail($id);
        $idioma->update($request->validate([
            'nombre' => ['required', 'string', 'max:100'],
            'codigo' => ['required', 'string', 'max:10'],
        ]));

        return view('idiomas.result', [
            'mensaje' => 'Idioma actualizado correctamente',
            'operacion' => 'actualizado'
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        Idioma::findOrFail($id)->delete();

        return view('idiomas.result', [
            'mensaje' => 'Idioma borrado correctamente',
            'operacion' => 'borrado'
        ]);
    }

    public function create()
    {
        return view('idiomas.create');
    }

    public function edit($id)
    {
        $idioma = Idioma::findOrFail($id);

        return view('idiomas.edit', compact('idioma'));
    }
}
?>

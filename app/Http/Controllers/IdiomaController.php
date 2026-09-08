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
        Idioma::create($request->only(['nombre', 'codigo']));

        return view('idiomas.result', [
            'mensaje' => 'Idioma creado correctamente',
            'operacion' => 'guardado'
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        Idioma::update($id, $request->only(['nombre', 'codigo']));

        return view('idiomas.result', [
            'mensaje' => 'Idioma actualizado correctamente',
            'operacion' => 'actualizado'
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        Idioma::destroy($id);

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
        $idioma = Idioma::find($id);

        if (!$idioma) {
            abort(404, 'Idioma no encontrado');
        }

        return view('idiomas.edit', compact('idioma'));
    }
}
?>

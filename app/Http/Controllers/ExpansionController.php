<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use App\Models\Idioma;
use App\Models\Expansion;
use Illuminate\Http\Request;

class ExpansionController extends Controller
{
    // READ (Todas con JOIN a Juego e Idioma)
    public function index()
    {
        $expansiones = Expansion::all();

        return view('expansiones.index', compact('expansiones'));
    }

    // READ (Una)
    public function show($id)
    {
        $expansion = Expansion::find($id);

        if (!$expansion) {
            abort(404, 'Expansión no encontrada');
        }

        return view('expansiones.show', compact('expansion'));
    }

    // CREATE
    public function store(Request $request)
    {
        Expansion::create($request->only(['juego_id', 'titulo', 'idioma_id']));

        return view('expansiones.result', [
            'mensaje' => 'Expansión creada correctamente',
            'operacion' => 'guardado'
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        Expansion::update($id, $request->only(['juego_id', 'titulo', 'idioma_id']));

        return view('expansiones.result', [
            'mensaje' => 'Expansión actualizada correctamente',
            'operacion' => 'actualizado'
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        Expansion::destroy($id);

        return view('expansiones.result', [
            'mensaje' => 'Expansión borrada correctamente',
            'operacion' => 'borrado'
        ]);
    }

    public function create()
    {
        $juegos = Juego::all();
        $idiomas = Idioma::all();
        return view('expansiones.create', compact('juegos', 'idiomas'));
    }

    public function edit($id)
    {
        $expansion = Expansion::find($id);

        if (!$expansion) {
            abort(404, 'Expansión no encontrada');
        }

        $juegos = Juego::all();
        $idiomas = Idioma::all();

        return view('expansiones.edit', compact('expansion', 'juegos', 'idiomas'));
    }
}
?>

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
        $expansiones = Expansion::with(['juego', 'idioma'])->get();

        return view('expansiones.index', compact('expansiones'));
    }

    // READ (Una)
    public function show($id)
    {
        $expansion = Expansion::with(['juego', 'idioma'])->findOrFail($id);

        return view('expansiones.show', compact('expansion'));
    }

    // CREATE
    public function store(Request $request)
    {
        $datos = $request->validate([
            'juego_id' => ['required', 'exists:juegos,id'],
            'titulo' => ['required', 'string', 'max:100'],
            'idioma_id' => ['required', 'exists:idiomas,id'],
        ]);

        Expansion::create($datos);

        return view('expansiones.result', [
            'mensaje' => 'Expansión creada correctamente',
            'operacion' => 'guardado'
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $expansion = Expansion::findOrFail($id);
        $datos = $request->validate([
            'juego_id' => ['required', 'exists:juegos,id'],
            'titulo' => ['required', 'string', 'max:100'],
            'idioma_id' => ['required', 'exists:idiomas,id'],
        ]);
        $expansion->update($datos);

        return view('expansiones.result', [
            'mensaje' => 'Expansión actualizada correctamente',
            'operacion' => 'actualizado'
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        Expansion::findOrFail($id)->delete();

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
        $expansion = Expansion::findOrFail($id);

        $juegos = Juego::all();
        $idiomas = Idioma::all();

        return view('expansiones.edit', compact('expansion', 'juegos', 'idiomas'));
    }
}
?>

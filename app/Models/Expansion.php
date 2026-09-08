<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Expansion // extends Model
{
    protected $table = 'expansiones';
    public $timestamps = true;
    protected $fillable = ['juego_id', 'titulo', 'idioma_id'];

    public static function all()
    {
        return DB::table('expansiones as e')
            ->join('juegos as j', 'e.juego_id', '=', 'j.id')
            ->join('idiomas as i', 'e.idioma_id', '=', 'i.id')
            ->select('e.id', 'e.titulo', 'j.titulo as juego_base', 'i.nombre as idioma')
            ->get();
    }

    public static function find($id)
    {
        return DB::table('expansiones as e')
            ->join('juegos as j', 'e.juego_id', '=', 'j.id')
            ->join('idiomas as i', 'e.idioma_id', '=', 'i.id')
            ->select('e.id', 'e.titulo', 'j.titulo as juego_base', 'i.nombre as idioma')
            ->where('e.id', $id)
            ->first();
    }

    public static function create(array $datos)
    {
        return DB::table('expansiones')->insert([
            'juego_id' => $datos['juego_id'] ?? null,
            'titulo' => $datos['titulo'] ?? null,
            'idioma_id' => $datos['idioma_id'] ?? null,
        ]);
    }

    public static function update($id, array $datos)
    {
        return DB::table('expansiones')
            ->where('id', $id)
            ->update([
                'juego_id' => $datos['juego_id'] ?? null,
                'titulo' => $datos['titulo'] ?? null,
                'idioma_id' => $datos['idioma_id'] ?? null,
            ]);
    }

    public static function destroy($id)
    {
        return DB::table('expansiones')
            ->where('id', $id)
            ->delete();
    }
}
?>

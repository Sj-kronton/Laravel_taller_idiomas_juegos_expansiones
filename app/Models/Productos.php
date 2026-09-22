<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    protected $fillable = [
        'categoria_id', 'nombre', 'descripcion', 'precio', 'stock', 'franquicia'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function ventas()
    {
        return $this->belongsToMany(Venta::class)
                    ->withPivot('cantidad', 'precio_unitario')
                    ->withTimestamps();
    }

    // Descuento del 10% si stock > 20
    public function getPrecioFinalAttribute()
    {
        return $this->stock > 20
            ? round($this->precio * 0.9, 2)
            : $this->precio;
    }

    public function getEnPromocionAttribute()
    {
        return $this->stock > 20;
    }
}

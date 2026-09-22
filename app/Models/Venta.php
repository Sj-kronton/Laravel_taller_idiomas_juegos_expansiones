<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = [
        'nombre_cliente', 'email', 'total',
        'tarjeta_numero', 'tarjeta_titular', 'tarjeta_expiracion', 'tarjeta_cvv'
    ];

    public function productos()
    {
        return $this->belongsToMany(Productos::class)
                    ->withPivot('cantidad', 'precio_unitario')
                    ->withTimestamps();
    }
}

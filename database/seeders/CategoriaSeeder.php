<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::create(['nombre' => 'Cómics']);
        Categoria::create(['nombre' => 'Ropa']);
        Categoria::create(['nombre' => 'Coleccionables']);
        Categoria::create(['nombre' => 'Accesorios']);
    }
}

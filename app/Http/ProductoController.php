<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Catálogo con filtros (página principal)
    public function index(Request $request)
    {
        $query = Productos::with('categoria');

        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->categoria);
        }
        if ($request->filled('franquicia')) {
            $query->where('franquicia', $request->franquicia);
        }
        if ($request->filled('nombre')) {
            $query->where('nombre', 'like', "%{$request->nombre}%");
        }

        $productos = $query->get();
        $categorias = Categoria::all();
        $franquicias = Productos::distinct()->pluck('franquicia');

        return view('productos.index', compact('productos', 'categorias', 'franquicias'));
    }

    // Vista del gestor (listado para CRUD)
    public function admin()
    {
        $productos = Productos::with('categoria')->get();
        return view('productos.admin', compact('productos'));
    }

    // Formulario de creación
    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create', compact('categorias'));
    }

    // Guardar nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'required|string',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'franquicia'   => 'required|string|max:255',
        ]);

        Productos::create($request->all());

        return redirect()->route('productos.admin')->with('success', 'Producto creado correctamente.');
    }

    // Detalle de un producto (página del producto)
    public function show(Productos $producto)
    {
        return view('productos.show', compact('producto'));
    }

    // Formulario de edición
    public function edit(Productos $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', compact('producto', 'categorias'));
    }

    // Actualizar producto
    public function update(Request $request, Productos $producto)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'required|string',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'franquicia'   => 'required|string|max:255',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.admin')->with('success', 'Producto actualizado correctamente.');
    }

    // Eliminar producto
    public function destroy(Productos $producto)
    {
        $producto->delete();
        return redirect()->route('productos.admin')->with('success', 'Producto eliminado.');
    }
}

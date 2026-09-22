<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Venta;


class CarritoController extends Controller
{
    // Ver el carrito
    public function index()
    {
        $carrito = session()->get('carrito', []);
        $productos = [];$total = 0;

        foreach ($carrito as $id => $cantidad) {
            $producto = Productos::find($id);
            if ($producto) {
                $productos[] = [
                    'producto' => $producto,
                    'cantidad' => $cantidad,
                    'subtotal' => $producto->precio_final * $cantidad,
                ];
                $total += $producto->precio_final * $cantidad;
            }
        }

        return view('carrito.index', compact('productos', 'total'));
    }

    // Agregar al carrito
    public function add(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad'   => 'required|integer|min:1',
        ]);

        $producto = Productos::findOrFail($request->producto_id);

        if ($producto->stock == 0) {
            return back()->with('error', 'El producto está agotado.');
        }

        if ($request->cantidad > $producto->stock) {
            return back()->with('error', 'No hay suficiente stock disponible.');
        }

        $carrito = session()->get('carrito', []);
        $carrito[$producto->id] = ($carrito[$producto->id] ?? 0) + $request->cantidad;
        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index')->with('success', 'Producto agregado al carrito.');
    }

    // Actualizar cantidades
    public function update(Request $request)
    {
        $carrito = session()->get('carrito', []);

        foreach ($request->cantidades as $id => $cantidad) {
            if ($cantidad <= 0) {
                unset($carrito[$id]);
            } else {
                $producto = Productos::find($id);
                if ($producto && $cantidad <= $producto->stock) {
                    $carrito[$id] = $cantidad;
                }
            }
        }

        session()->put('carrito', $carrito);
        return back()->with('success', 'Carrito actualizado.');
    }

    // Remover un producto
    public function remove($id)
    {
        $carrito = session()->get('carrito', []);
        unset($carrito[$id]);
        session()->put('carrito', $carrito);

        return back()->with('success', 'Producto eliminado del carrito.');
    }

    // Mostrar checkout
    public function checkout()
    {
        $carrito = session()->get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('productos.index')->with('error', 'El carrito está vacío.');
        }

        $productos = [];$total = 0;

        foreach ($carrito as $id => $cantidad) {
            $producto = Productos::find($id);
            if ($producto) {
                $productos[] = [
                    'producto' => $producto,
                    'cantidad' => $cantidad,
                    'subtotal' => $producto->precio_final * $cantidad,
                ];
                $total += $producto->precio_final * $cantidad;
            }
        }

        return view('carrito.checkout', compact('productos', 'total'));
    }

    // Procesar el pago (registrar venta)
    public function procesar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email'  => 'required|email',
            'tarjeta_numero'     => 'required|digits:16',
            'tarjeta_titular'    => 'required|string|max:255',
            'tarjeta_expiracion' => 'required|regex:/^\d{2}\/\d{2}$/',
            'tarjeta_cvv'        => 'required|digits:3',
        ]);

        $carrito = session()->get('carrito', []);
        if (empty($carrito)) {
            return redirect()->route('productos.index')->with('error', 'El carrito está vacío.');
        }

        $total = 0;

        DB::transaction(function () use ($request, $carrito, &$total) {
            $items = [];

            foreach ($carrito as $id => $cantidad) {
                $producto = Productos::lockForUpdate()->find($id);

                if (!$producto || $producto->stock < $cantidad) {
                    throw new \Exception("Stock insuficiente para {$producto->nombre}");
                }

                $producto->stock -= $cantidad;
                $producto->save();

                $items[] = [
                    'producto_id' => $producto->id,
                    'cantidad' => $cantidad,
                    'precio_unitario' => $producto->precio_final,
                ];

                $total += $producto->precio_final * $cantidad;
            }

            $venta = Venta::create([
                'nombre_cliente' => $request->nombre,
                'email' => $request->email,
                'total' => $total,
                'tarjeta_numero' => $request->tarjeta_numero,
                'tarjeta_titular' => $request->tarjeta_titular,
                'tarjeta_expiracion' => $request->tarjeta_expiracion,
                'tarjeta_cvv' => $request->tarjeta_cvv,
            ]);

            $venta->productos()->attach($items);
        });

        session()->forget('carrito');

        return redirect()->route('productos.index')->with('success', "¡Compra realizada! Total pagado: \${$total}");
    }
}

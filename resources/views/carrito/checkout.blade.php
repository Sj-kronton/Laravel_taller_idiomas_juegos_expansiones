@extends('layouts.app')

@section('content')
<h1 class="mb-4">Checkout</h1>

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">Datos del cliente y pago</div>
            <div class="card-body">
                <form method="POST" action="{{ route('carrito.procesar') }}">
                    @csrf

                    <h5>Cliente</h5>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <h5 class="mt-4">Tarjeta de crédito</h5>
                    <div class="mb-3">
                        <label class="form-label">Número</label>
                        <input type="text" name="tarjeta_numero" class="form-control" maxlength="16" placeholder="1234567890123456" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Titular</label>
                        <input type="text" name="tarjeta_titular" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Expiración (MM/AA)</label>
                            <input type="text" name="tarjeta_expiracion" class="form-control" placeholder="12/27" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">CVV</label>
                            <input type="text" name="tarjeta_cvv" class="form-control" maxlength="3" placeholder="123" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Pagar ${{ number_format($total,2) }}</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-5">
        <div class="card">
            <div class="card-header">Resumen del pedido</div>
            <div class="card-body">
                <table class="table table-sm">
                    @foreach($productos as $item)
                        <tr>
                            <td>{{ $item['producto']->nombre }} × {{ $item['cantidad'] }}</td>
                            <td class="text-end">${{ number_format($item['subtotal'], 2) }}</td>
                        </tr>
                    @endforeach
                    <tr class="fw-bold">
                        <td>Total</td>
                        <td class="text-end">${{ number_format($total,2) }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
    $table->id();
    $table->string('nombre_cliente');
    $table->string('email');
    $table->decimal('total', 10, 2);
    $table->string('tarjeta_numero');
    $table->string('tarjeta_titular');
    $table->string('tarjeta_expiracion');
    $table->string('tarjeta_cvv');
    $table->timestamps();
    });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
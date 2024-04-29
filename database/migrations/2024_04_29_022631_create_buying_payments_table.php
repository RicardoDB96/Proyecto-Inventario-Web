<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('buying_payments', function (Blueprint $table) {
            $table->increments('id')->comment('Id de fila de la compra');
            $table->integer('buying_id')->nullable()->unsigned()->comment('Compras');
            $table->foreign('buying_id')->references('id')->on('buyings');
            $table->integer('payment_type_id')->nullable()->unsigned()->comment('Tipo de pago');
            $table->foreign('payment_type_id')->references('id')->on('buying_payment_types');
            $table->integer('amount')->comment('Cantidad pagada');
			$table->timestamp('creation_date', 0)->useCurrent()->comment('Fecha de creación');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buying_payments');
    }
};

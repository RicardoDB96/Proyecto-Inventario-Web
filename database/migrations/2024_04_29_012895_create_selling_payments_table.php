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
        Schema::create('selling_payments', function (Blueprint $table) {
            $table->increments('id')->comment('Id de fila de la venta');
            $table->integer('selling_id')->nullable()->unsigned()->comment('Venta');
            $table->foreign('selling_id')->references('id')->on('sellings');
            $table->integer('payment_type_id')->nullable()->unsigned()->comment('Tipo de pago');
            $table->foreign('payment_type_id')->references('id')->on('selling_payment_types');
            $table->integer('amount')->comment('Cantidad pagada');
			$table->timestamp('creation_date', 0)->useCurrent()->comment('Fecha de creación');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

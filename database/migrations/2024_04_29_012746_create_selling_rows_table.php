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
        Schema::create('selling_rows', function (Blueprint $table) {
            $table->increments('id')->comment('Id de fila de la venta');
            $table->integer('selling_id')->nullable()->unsigned()->comment('Venta');
            $table->foreign('selling_id')->references('id')->on('sellings');
            $table->integer('product_id')->nullable()->unsigned()->comment('Producto');
            $table->foreign('product_id')->references('id')->on('products');
            $table->float('price',12,4)->nullable()->comment('Precio de la venta');
            $table->float('iva',10,4)->nullable()->comment('Iva de la venta');
            $table->integer('amount')->comment('Unidades vendidas');
            $table->float('subtotal',12,4)->nullable()->comment('Subtotal de la venta');
            $table->float('total',12,4)->nullable()->comment('Total de la venta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selling_row');
    }
};

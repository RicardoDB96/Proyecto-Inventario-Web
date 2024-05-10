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
        Schema::create('buying_rows', function (Blueprint $table) {
            $table->increments('id')->comment('Id de fila de la comnpra');
            $table->integer('buying_id')->nullable()->unsigned()->comment('Compra');
            $table->foreign('buying_id')->references('id')->on('buyings');
            $table->integer('product_id')->nullable()->unsigned()->comment('Producto');
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('supplier_id')->nullable()->unsigned()->comment('Proveedor');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->float('price',12,4)->nullable()->comment('Precio de la compra');
            $table->float('iva',10,4)->nullable()->comment('Iva de la compra');
            $table->integer('amount')->comment('Unidades vendidas');
            $table->float('subtotal',12,4)->nullable()->comment('Subtotal de la compra');
            $table->float('total',12,4)->nullable()->comment('Total de la compra');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buying_row');
    }
};

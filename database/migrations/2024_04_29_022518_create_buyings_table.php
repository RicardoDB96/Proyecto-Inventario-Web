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
        Schema::create('buyings', function (Blueprint $table) {
            $table->increments('id')->comment('Id de la compra');
            $table->string('client',255)->comment('Nombre del cliente');
			$table->timestamp('creation_date', 0)->useCurrent()->comment('Fecha de creación');
            $table->float('subtotal',12,4)->nullable()->comment('Subtotal de la compra');
            $table->float('iva',10,4)->nullable()->comment('Iva de la compra');
            $table->float('total',12,4)->nullable()->comment('Total de la compra');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buyings');
    }
};

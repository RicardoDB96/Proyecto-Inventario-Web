<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventory_logs', function (Blueprint $table) {
            //INVENTORY_LOGS INVENTORY SYSTEM
            $table->increments('id')->comment('Registro de inventario');
            $table->integer('entity_id')->unsigned()->comment('Entidad a la que se hace referencia');
            $table->integer('inventory_id')->unsigned()->comment('Inventario');
            $table->foreign('inventory_id')->references('id')->on('inventories');
            $table->integer('initial_inventory')->comment('Unidades totales');
            $table->integer('delta_inventory')->comment('Unidades compradas/vendidas');
            $table->integer('final_inventory')->comment('Unidades compradas/vendidas');
            $table->integer('row_id')->unsigned()->comment('Columna del movimiento');
			$table->timestamp('creation_date', 0)->useCurrent()->comment('Fecha de creación');

            //Datos de creación y modificación
			$table->string('notes', 1024)->nullable()->comment('Notas');
			$table->boolean('is_active')->default(1)->comment('Muestra si la fila está activa');
			$table->integer('created_by')->unsigned()->nullable()->comment('Usuario que creó');
			$table->foreign('created_by')->references('id')->on('users');
			$table->integer('updated_by')->unsigned()->nullable()->comment('Último usuario que modificó');
			$table->foreign('updated_by')->references('id')->on('users');
			$table->timestamp('created_at', 0)->useCurrent()->comment('Fecha de creación');
			$table->timestamp('updated_at', 0)->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))
				->comment('Última fecha de modificación');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_logs');
    }
};

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
        Schema::create('role_logs', function (Blueprint $table) {
            $table->increments('id')->comment('Id de del log de role');
            $table->integer('role_id')->unsigned(); // Agrega el campo para almacenar el ID de la categoría relacionada
            $table->integer('user_id')->unsigned(); // Agrega el campo para almacenar el ID del usuario
            $table->string('action'); // Agrega el campo para almacenar el tipo de acción
            $table->string('description'); // Agrega el campo para almacenar la descripcion de la accion
			$table->timestamp('created_at', 0)->useCurrent()->comment('Fecha de creación');
			$table->timestamp('updated_at', 0)->useCurrent()->comment('Fecha de actialización');

            // Agrega una restricción de clave externa para la relación con la tabla de categorías
            $table->foreign('role_id')->references('id')->on('roles');

            // Agrega una restricción de clave externa para la relación con la tabla de usuarios
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_logs');
    }
};

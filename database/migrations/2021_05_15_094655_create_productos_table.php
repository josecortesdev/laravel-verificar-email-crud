<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->decimal('precio', 8, 2);
            //  $table->string('usuarioid');
            $table->unsignedBigInteger('usuarioid')->nullable();
            // Este hará referencia al id del usuario
            // Especificamos que se pueda poner nulo por si se borra el usuario

            //Restricción de llave foránea para que no haya un número que no pertenezca a un id existente

            $table->foreign('usuarioid')
                ->references('id')
                ->on('users')
                ->onDelete('set null');

            //references: a qué campo hace referencia | on: en qué tabla | 
            //on delete - set null - Si se elimina un usuario, no quiero que se elimine sus productos
            // si este campo va a quedar null, tenemos que especificar arriba, que pueda aceptar valores nulos



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}

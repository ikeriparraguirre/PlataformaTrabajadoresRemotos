<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Para crear la tabla files que sera donde se almacenen todas las imagenes.
        Schema::create('files', function (Blueprint $table){
            $table->increments('id')->index();
            $table->string('nombre');
            //Usamos binary a la hora de hacer la migracion porque es de tipo blob solo que lleva otro nombre.
            $table->binary('archivo');
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

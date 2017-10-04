<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePruebasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pruebas', function (Blueprint $table) {
            $table->increments('id_prueba');
            $table->string('name');
            $table->string('correo')->unique();
            $table->string('password');

        });

//        Schema::table('pruebas', function($table){
////           $table->renameColumn('name','nombre');
//           $table->dropColumn(['name']);

//    });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pruebas');
    }
}

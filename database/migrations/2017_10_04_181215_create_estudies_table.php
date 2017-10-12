<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id_studies');
            $table->integer('id_user');
            $table->string('type_studies',25);//secundaria,universitaria,maestrias,etc            
            $table->string('status_studies',25);//en curso, culminado, abandonado
            $table->string('name_institute',100); 
            $table->string('career',100);// area de estudio podria ser ingenieria de sistemas, bachiller en ciencia etc
            $table->string('date_in_studies');
            $table->string('date_out_studies');
            $table->string('ubication_institute',255);
            $table->integer('note_average');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('estudies');
    }
}

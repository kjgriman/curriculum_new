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
        Schema::create('estudies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jobs');
            $table->string('name_institute');
            $table->string('date_in');
            $table->string('date_out');
            $table->string('ubication_institute');
            $table->string('observation');
            $table->boolean('actuality');
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

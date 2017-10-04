<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id_jobs');
            $table->string('name_company');
            $table->string('cargo');
            $table->string('date_in');
            $table->string('date_out');
            $table->string('ubication_company');
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
        Schema::drop('jobs');
    }
}

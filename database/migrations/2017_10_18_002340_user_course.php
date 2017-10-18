<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user_course', function (Blueprint $table) {
            $table->increments('id_usercourse');
            $table->integer('id_user');
            $table->integer('id_course');
            $table->string('date_asignation',11);

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

        Schema::drop('user_course');
    }
}

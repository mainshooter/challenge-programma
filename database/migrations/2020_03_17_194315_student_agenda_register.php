<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StudentAgendaRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event', function(Blueprint $table) {
          $table->bigIncrements('id')->change();
        });

        Schema::create('student_event', function(Blueprint $table) {
          $table->unsignedBigInteger('student_id');
          $table->unsignedBigInteger('event_id');
        });

        Schema::table('student_event', function(Blueprint $table) {
          $table->foreign('student_id')->references('id')->on('users')->onDelete('cascade');
          $table->foreign('event_id')->references('id')->on('event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('student_agenda');
        Schema::table('event'. function(Blueprint $table) {
          $table->increments('id')->change();
        });
    }
}

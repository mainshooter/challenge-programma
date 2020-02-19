<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function(Blueprint $table) {
          $table->increments('id');
          $table->string('name');
          $table->text('description');
          $table->integer("points");
          $table->string('street');
          $table->string('city');
          $table->integer("house_number");
          $table->string("house_number_addition");
          $table->dateTime('event_start_date_time');
          $table->dateTime('event_end_date_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('event');
    }
}

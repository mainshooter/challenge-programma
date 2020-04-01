<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixEventDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_event', function(Blueprint $table) {
          $table->dropForeign('student_event_event_id_foreign');
          $table->foreign('event_id')->references('id')->on('event')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_event', function(Blueprint $table) {
          $table->dropForeign('student_event_event_id_foreign');
          $table->foreign('event_id')->references('id')->on('event');
        });
    }
}

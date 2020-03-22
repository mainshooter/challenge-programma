<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PrimaryKeyStudentEvent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_event', function(Blueprint $table) {
          $table->primary(['student_id', 'event_id']);
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
          $table->dropPrimary('student_id');
          $table->dropPrimary('event_id');
        });
    }
}

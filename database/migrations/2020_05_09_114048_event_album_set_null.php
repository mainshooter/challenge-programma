<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EventAlbumSetNull extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event', function(Blueprint $table) {
          $table->dropForeign('event_photoalbum_id_foreign');
          $table->foreign('photoalbum_id')->references('id')->on('photoalbum')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('event', function (Blueprint $table) {
          $table->dropForeign('event_photoalbum_id_foreign');
          $table->foreign('photoalbum_id')->references('id')->on('photoalbum');
      });
    }
}

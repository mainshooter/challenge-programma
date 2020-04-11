<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImageFromAlbum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('image_from_album', function (Blueprint $table) {
            $table->increments("id");
            $table->string('path');
            $table->integer('photoalbum_id')->unsigned();
            $table->foreign('photoalbum_id')->references('id')->on('photoalbum')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('image_from_album');
    }
}

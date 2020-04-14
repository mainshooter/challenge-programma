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
            $table->bigIncrements("id");
            $table->string('path');
            $table->bigInteger('photoalbum_id')->nullable()->unsigned();
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
        Schema::dropIfExists('image_from_album');
    }
}

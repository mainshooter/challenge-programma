<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeletePublishedColumn extends Migration
{
    public function up()
    {
        Schema::table('photoalbum', function (Blueprint $table) {

            $table->dropColumn('is_published');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('photoalbum', function (Blueprint $table) {
            $table->dropColumn('is_published');
        });
    }
}

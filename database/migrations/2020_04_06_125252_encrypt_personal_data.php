<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EncryptPersonalData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
          $aUsers = DB::table('users')->get();

          foreach ($aUsers as $oUser) {
            DB::table('users')
              ->where('id', $oUser->id)
              ->update([
                'firstname' => encrypt($oUser->firstname),
                'middlename' => encrypt($oUser->middlename),
                'lastname' => encrypt($oUser->lastname),
              ]);
          }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users', function(Blueprint $table) {
        $aUsers = DB::table('users')->get();

        foreach ($aUsers as $oUser) {
          DB::table('users')
            ->where('id', $oUser->id)
            ->update([
              'firstname' => decrypt($oUser->firstname),
              'middlename' => decrypt($oUser->middlename),
              'lastname' => decrypt($oUser->lastname),
            ]);
        }
      });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RefactorRegister extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('student');
        Schema::drop('company');

        Schema::table('users', function(Blueprint $table) {
          $table->boolean('is_accepted');
          $table->string('phone');
          $table->dropColumn('name');
          $table->dropColumn('role');
          $table->string('firstname');
          $table->string('middlename')->nullable();
          $table->string('lastname');
        });

        Schema::create('company_info', function(Blueprint $table) {
          $table->unsignedBigInteger('user_id')->primary();
          $table->string('company_name');
          $table->string('street');
          $table->string('city');
          $table->integer("house_number");
          $table->string("house_number_addition")->nullable();
          $table->string('zipcode');
        });

        Schema::create('student_info', function(Blueprint $table) {
          $table->unsignedBigInteger('user_id')->primary();
          $table->integer('school_year');
        });

        Schema::table('company_info', function(Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('student_info', function(Blueprint $table) {
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('users', function(Blueprint $table) {
          $table->enum('role', ['admin', 'student', 'company']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::create('student', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('firstname');
          $table->string('prefix')->nullable();
          $table->string('lastname');
          $table->string('phone');
          $table->integer('schoolyear');
          $table->string('email')->unique();
          $table->string('password');
          $table->rememberToken(); //remember me stuffs
          $table->timestamps();
      });
      Schema::create('company', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('firstname');
          $table->string('prefix')->nullable();
          $table->string('lastname');
          $table->string('companyname');
          $table->string('address');
          $table->string('postalcode');
          $table->string('phone');
          $table->string('email')->unique();
          $table->string('password');
          $table->rememberToken();
          $table->timestamps();
      });
      Schema::table('student', function (Blueprint $table) {
          $table->boolean('is_accepted');
      });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlockedUsersTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('blocked_users', function (Blueprint $table) {

          $table->increments('id');
          $table->unsignedBigInteger('user_id')->unsigned();
          $table->unsignedBigInteger('opponent')->unsigned();
          $table->timestamps();
            //$table->softDeletes();

        });

      Schema::table('blocked_users', function(Blueprint $table) {

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('opponent')->references('id')->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('blocked_users');
    }
}

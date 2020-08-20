<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EncriptedPasswordEditUsersTable extends Migration
{

  /**
   * Run the migrations.
   */
  public function up()
  {
    Schema::table('users', function (Blueprint $table) {
      $table->string('encripted_password')->nullable();

    });
  }

  /**
   * Reverse the migrations.
   */
  public function down()
  {

    Schema::table('users', function($table) {
      $table->dropColumn('encripted_password');
    });
  }
}

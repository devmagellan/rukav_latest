<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddLastLoginToUsersTable extends Migration
{

  /**
   * Run the migrations.
   */
  public function up()
  {
      Schema::table('users', function (Blueprint $table) {
          $table->string('ip')->nullable();
          $table->dateTime('last_login_datetime')->nullable();

      });
  }

  /**
   * Reverse the migrations.
   */
  public function down()
  {
      Schema::table('users', function($table) {
          $table->dropColumn('ip');
          $table->dropColumn('last_login_datetime');

      });

  }
}

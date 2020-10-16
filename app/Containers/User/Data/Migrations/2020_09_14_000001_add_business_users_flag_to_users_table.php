<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddBusinessUsersFlagToUsersTable extends Migration
{

  /**
   * Run the migrations.
   */
  public function up()
  {
      Schema::table('users', function (Blueprint $table) {
          $table->boolean('business_users_flag')->nullable();
      });
  }

  /**
   * Reverse the migrations.
   */
  public function down()
  {
      Schema::table('users', function($table) {
          $table->dropColumn('business_users_flag');

      });

  }
}

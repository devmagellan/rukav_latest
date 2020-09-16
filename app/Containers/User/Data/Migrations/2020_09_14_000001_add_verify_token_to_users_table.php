<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddVerifyTokenToUsersTable extends Migration
{

  /**
   * Run the migrations.
   */
  public function up()
  {
      Schema::table('users', function (Blueprint $table) {
          $table->string('verify_token')->nullable();
      });
  }

  /**
   * Reverse the migrations.
   */
  public function down()
  {
      Schema::table('users', function($table) {
          $table->dropColumn('verify_token');

      });

  }
}

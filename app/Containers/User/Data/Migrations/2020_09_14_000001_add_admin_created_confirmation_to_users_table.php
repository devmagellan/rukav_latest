<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddAdminCreatedConfirmationToUsersTable extends Migration
{

  /**
   * Run the migrations.
   */
  public function up()
  {
      Schema::table('users', function (Blueprint $table) {
          $table->datetime('admin_created_confirmation')->nullable();
      });
  }

  /**
   * Reverse the migrations.
   */
  public function down()
  {
      Schema::table('users', function($table) {
          $table->dropColumn('admin_created_confirmation');

      });

  }
}

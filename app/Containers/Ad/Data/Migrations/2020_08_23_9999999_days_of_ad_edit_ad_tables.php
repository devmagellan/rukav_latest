<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class DaysOfAdEditAdTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::table('ads', function (Blueprint $table) {
          $table->integer('select_time')->nullable();
        $table->dateTime('expired')->nullable();
		$table->boolean('expired_sent')->default(false);

      });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
      Schema::table('ads', function($table) {
          $table->dropColumn('select_time');
        $table->dropColumn('expired');
		$table->dropColumn('expired_sent');
      });
    }
}

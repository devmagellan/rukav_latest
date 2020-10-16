<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CounterEditAdTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::table('ads', function (Blueprint $table) {
		$table->boolean('counter')->nullable();

      });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
      Schema::table('ads', function($table) {
        $table->dropColumn('counter');
      });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PriceVariablesEditAdTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::table('ads', function (Blueprint $table) {
		  $table->integer('payment')->nullable()->default(null);
      $table->integer('age')->nullable()->default(null);
      });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
      Schema::table('ads', function($table) {
        $table->dropColumn('payment');
        $table->dropColumn('age');
      });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class TmpEditAdTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::table('ads', function (Blueprint $table) {
		$table->boolean('is_tmp')->default(true);

      });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
      Schema::table('ads', function($table) {
        $table->dropColumn('is_tmp');
      });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class LocationTypeEditAdTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::table('ads', function (Blueprint $table) {
		$table->string('select_addres')->default('');

      });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
      Schema::table('ads', function($table) {
        $table->dropColumn('select_addres');
      });
    }
}

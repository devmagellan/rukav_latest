<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class LanguageFilterEditAdTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::table('ads', function (Blueprint $table) {
		  $table->json('language_filter')->nullable();
      });
    }
    /**
     * Reverse the migrations.
     */
    public function down()
    {
      Schema::table('ads', function($table) {
        $table->dropColumn('language_filter');
      });
    }
}

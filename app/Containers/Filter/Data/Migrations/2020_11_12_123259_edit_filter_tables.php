<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EditFilterTables extends Migration
{

  public function up()
  {
    Schema::table('filters', function (Blueprint $table) {
      $table->string('format')->nullable()->default('input');
      $table->json('values')->nullable()->default(null);
      $table->string('default_value')->nullable()->default(null);
    });
  }
  /**
   * Reverse the migrations.
   */
  public function down()
  {
    Schema::table('filters', function($table) {
      $table->dropColumn('format');
      $table->dropColumn('values');
      $table->dropColumn('default_value');
    });
  }
}

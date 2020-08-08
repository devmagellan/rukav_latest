<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditBusinessAccountTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::table('business_accounts', function (Blueprint $table) {
        $table->integer('hours_from_weekday')->nullable();
        $table->integer('minutes_from_weekday')->nullable();
        $table->integer('hours_till_weekday')->nullable();
        $table->integer('minutes_till_weekday')->nullable();
        $table->integer('hours_from_saturday')->nullable();
        $table->integer('minutes_from_saturday')->nullable();
        $table->integer('hours_till_saturday')->nullable();
        $table->integer('minutes_till_saturday')->nullable();
        $table->integer('hours_from_sunday')->nullable();
        $table->integer('minutes_from_sunday')->nullable();
        $table->integer('hours_till_sunday')->nullable();
        $table->integer('minutes_till_sunday')->nullable();
        $table->boolean('show_work_hours')->nullable();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
      Schema::table('business_accounts', function($table) {
          $table->dropColumn('hours_from_weekday');
          $table->dropColumn('minutes_from_weekday');
          $table->dropColumn('hours_till_weekday');
          $table->dropColumn('minutes_till_weekday');
          $table->dropColumn('hours_from_saturday');
          $table->dropColumn('hours_till_saturday');
          $table->dropColumn('minutes_till_saturday');
          $table->dropColumn('hours_from_sunday');
          $table->dropColumn('minutes_from_sunday');
          $table->dropColumn('hours_till_sunday');
          $table->dropColumn('minutes_till_sunday');
          $table->dropColumn('show_work_hours');
      });
  }
}

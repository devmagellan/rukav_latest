<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddBusinessTypeToBusinessAccountTable extends Migration
{

  /**
   * Run the migrations.
   */
  public function up()
  {
      Schema::table('business_accounts', function (Blueprint $table) {
          $table->string('business_type')->nullable();
        $table->string('business_location')->nullable();
        $table->string('www')->nullable();
      });
  }

  /**
   * Reverse the migrations.
   */
  public function down()
  {
      Schema::table('business_accounts', function($table) {
          $table->dropColumn('business_type');
        $table->dropColumn('business_location');
        $table->dropColumn('www');

      });

  }
}

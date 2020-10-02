<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EditConnectTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::table('connects', function (Blueprint $table) {
        $table->string('photo')->nullable();
        $table->bigInteger('message_id')->unsigned()->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('connects', function($table) {
        $table->dropColumn('photo');

      });
    }
}

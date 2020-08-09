<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EditStaticpagePositionTables extends Migration
{

    public function up()
    {
        Schema::table('static_pages', function (Blueprint $table) {
            $table->integer('position');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('static_pages', function($table) {
            $table->dropColumn('position');
        });
    }
}

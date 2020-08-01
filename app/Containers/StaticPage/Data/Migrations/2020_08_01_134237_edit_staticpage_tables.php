<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EditStaticpageTables extends Migration
{

    public function up()
    {
        Schema::table('static_pages', function (Blueprint $table) {
            $table->integer('type')->nullable();
            $table->integer('group')->default(1)->change();

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
            $table->dropColumn('type');
        });
    }
}

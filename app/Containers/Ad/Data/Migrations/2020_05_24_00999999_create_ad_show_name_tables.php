<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdShowNameTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->addColumn('boolean', 'show_name')->default(false);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropColumn('show_name');
    }
}

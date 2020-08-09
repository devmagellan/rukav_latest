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

        if (Schema::hasColumn('ads','show_name'))

        {

            Schema::table('ads', function (Blueprint $table)

            {

                $table->dropColumn('show_name');

            });

        }

    }
}

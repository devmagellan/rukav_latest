<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdStatusesTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ad_statuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ad_statuses');
    }
}

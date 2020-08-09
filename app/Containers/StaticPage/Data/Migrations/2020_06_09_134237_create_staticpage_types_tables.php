<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaticpageTypesTables extends Migration
{

    public function up()
    {
        Schema::create('staticpage_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('link');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staticpage_types');
    }
}

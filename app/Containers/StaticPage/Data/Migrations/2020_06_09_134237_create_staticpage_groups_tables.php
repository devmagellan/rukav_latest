<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaticpageGroupsTables extends Migration
{

    public function up()
    {
        Schema::create('staticpage_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('staticpage_id');
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
        Schema::dropIfExists('staticpage_groups');
    }
}

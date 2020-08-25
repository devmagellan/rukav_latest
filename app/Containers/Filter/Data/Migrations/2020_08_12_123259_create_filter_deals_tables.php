<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFilterDealsTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('filter_deals', function (Blueprint $table) {
          $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
          $table->boolean('active');
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('filter_deals');
    }
}

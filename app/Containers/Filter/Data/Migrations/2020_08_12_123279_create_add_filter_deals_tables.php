<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddFilterDealsTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('add_filter_deals', function (Blueprint $table) {
          $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('filter_deals_id')->unsigned();
          $table->unsignedBigInteger('add_id')->unsigned();
            $table->timestamps();
            //$table->softDeletes();

        });
      Schema::table('add_filter_deals', function(Blueprint $table) {

        $table->foreign('filter_deals_id')->references('id')->on('filter_deals')->onDelete('cascade');
        $table->foreign('add_id')->references('id')->on('ads')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('add_filter_deals');
    }
}

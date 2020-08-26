<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoryFilterDealsTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('category_filter_deals', function (Blueprint $table) {
          $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('filter_id')->unsigned();
          $table->unsignedBigInteger('category_id')->unsigned();
            $table->timestamps();
            //$table->softDeletes();

        });
      Schema::table('category_filter_deals', function(Blueprint $table) {

        $table->foreign('filter_id')->references('id')->on('filter_deals')->onDelete('cascade');
        $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('category_filter_deals');
    }
}

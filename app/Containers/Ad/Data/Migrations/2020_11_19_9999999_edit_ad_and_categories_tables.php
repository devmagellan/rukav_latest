<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class EditAdAndCategoriesTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
 /*     Schema::table('ads', function (Blueprint $table) {

        $table->dropForeign('ads_category_id_foreign');
    });

      Schema::table('category_filter_deals', function(Blueprint $table) {
        $table->dropForeign('category_filter_deals_category_id_foreign');
      });
      Schema::table('category_filters', function(Blueprint $table) {
        $table->dropForeign('category_filters_category_id_foreign');

      });
      Schema::table('product_categories', function (Blueprint $table) {

        $table->bigIncrements('id')->primary()->change();;
      });



      Schema::table('ads', function(Blueprint $table) {
        $table->unsignedBigInteger('category_id')->index()->change();
        $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
      });

      Schema::table('category_filter_deals', function(Blueprint $table) {
        $table->unsignedBigInteger('category_id')->index()->change();
        $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
      });
      Schema::table('category_filters', function(Blueprint $table) {

        $table->unsignedBigInteger('category_id')->index()->change();
        $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
      });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
    }
}

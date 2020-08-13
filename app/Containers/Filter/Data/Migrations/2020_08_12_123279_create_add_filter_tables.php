<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddFilterTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('add_filters', function (Blueprint $table) {
          $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('filter_id')->unsigned();
          $table->unsignedBigInteger('add_id')->unsigned();
          $table->string('value')->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });
      Schema::table('add_filters', function(Blueprint $table) {

        $table->foreign('filter_id')->references('id')->on('filters')->onDelete('cascade');
        $table->foreign('add_id')->references('id')->on('ads')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('add_filters');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlacesUkTable extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('places_uk', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('places_uk');
    }
}

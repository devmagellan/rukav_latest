<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBritainRegionsTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('britain_regions', function (Blueprint $table) {
           $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('parent_id');
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('britain_regions');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecondMessangerGroupsTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('second_messanger_groups', function (Blueprint $table) {
           $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('group_name');
            $table->integer('parrent_category_id');
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('second_messanger_groups');
    }
}

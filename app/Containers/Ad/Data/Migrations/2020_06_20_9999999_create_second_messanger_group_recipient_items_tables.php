<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSecondMessangerGroupRecipientItemsTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('second_messanger_group_recipient_items', function (Blueprint $table) {
           $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('group_id');
            $table->integer('user_id');
            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('second_messanger_group_recipient_items');
    }
}

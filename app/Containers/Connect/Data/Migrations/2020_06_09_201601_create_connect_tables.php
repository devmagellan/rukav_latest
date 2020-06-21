<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConnectTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('connects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('sender_id');
            $table->bigInteger('receiver_id')->nullable()->unsigned();
            $table->string('text');
            $table->bigInteger('message_id')->unsigned();
            $table->string('group_id')->nullable();
            $table->string('sender_name')->nullable();
            $table->string('sender_email')->nullable();
            $table->string('sender_phone')->nullable();
            $table->timestamps();


        });

        Schema::table('connects', function($table) {
            //$table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('message_id')->references('id')->on('ads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('connects');
    }
}

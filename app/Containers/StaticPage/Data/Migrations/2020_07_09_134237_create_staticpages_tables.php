<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaticpagesTables extends Migration
{

    public function up()
    {
        Schema::create('static_pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('content');
            $table->integer('group')->nullable();
            $table->boolean('active');
            $table->unsignedBigInteger('editor')->unsigned();
            $table->timestamps();
        });

        Schema::table('static_pages', function(Blueprint $table) {

            $table->foreign('editor')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('static_pages');
    }
}

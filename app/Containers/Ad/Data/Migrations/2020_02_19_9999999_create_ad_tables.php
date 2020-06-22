<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
           $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->unsignedBigInteger('sender')->unsigned();
            $table->string('title');
            $table->integer('status')->default(1);
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('place_id');
            $table->string('city');
            $table->string('administrative');
            $table->string('message');
            $table->float('price')->nullable();
            $table->integer('visibility');
            $table->boolean('active')->default(true);
            $table->string('name')->nullable();
            $table->integer('second_messanger_group_id')->nullable();
            $table->timestamps();
            //$table->softDeletes();

        });

        Schema::table('ads', function(Blueprint $table) {

            $table->foreign('sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}

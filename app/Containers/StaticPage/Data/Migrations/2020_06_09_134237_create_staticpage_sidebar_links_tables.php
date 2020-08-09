<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaticpageSidebarLinksTables extends Migration
{

    public function up()
    {
        Schema::create('staticpage_sidebar_links', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('staticpage_id');
            $table->string('name');
            $table->string('link');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staticpage_sidebar_links');
    }
}

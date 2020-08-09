<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminmenuTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('admin_menus', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('parent_id');
            $table->string('name');
            $table->string('icon');
            $table->string('link');
            $table->string('permission')->nullable()->default(null);
            $table->string('type');
            $table->string('system_name');
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('admin_menus');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            //$table->bigInteger('company_id')->unsigned();
            $table->date('birth_date');
            $table->date('start_date');
            $table->string('department');
            $table->boolean('sex');
            $table->string('photo');
            $table->string('position');
            $table->integer('manager_id');
            $table->boolean('active')->default(0);
            $table->string('location');




            $table->timestamps();


        });

        Schema::table('customers', function($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');;
            //$table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}

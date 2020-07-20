<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndividualAccountTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('individual_accounts', function (Blueprint $table) {
      $table->id();
      $table->string('business_name');
      $table->string('www');
      $table->string('address');
      $table->string('post_code');
      $table->unsignedBigInteger('user_id');
      $table->softDeletes();
      $table->timestamps();
      $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('individual_accounts');
  }
}

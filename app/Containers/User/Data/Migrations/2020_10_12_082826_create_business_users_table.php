<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('business_users', function (Blueprint $table) {
      $table->id();
      $table->string('email');
      $table->string('company_name');
        $table->string('business_type')->nullable();
        $table->string('business_location')->nullable();
      $table->string('www');
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
    Schema::dropIfExists('business_users');
  }
}

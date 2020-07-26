<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessAccountTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('business_accounts', function (Blueprint $table) {
      $table->id();
        $table->string('company_name');
      $table->string('option_user');
      $table->string('name_job');
        $table->string('phisical_address')->nullable();
        $table->string('phisical_post_code')->nullable();
      $table->string('address');
      $table->string('post_code');
      $table->string('reg_number')->nullable();
      $table->string('vat_number')->nullable();
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
    Schema::dropIfExists('business_accounts');
  }
}

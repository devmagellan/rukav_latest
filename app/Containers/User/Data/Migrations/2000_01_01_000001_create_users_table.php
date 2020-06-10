<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration
{

  /**
   * Run the migrations.
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->string('name')->nullable();
       $table->boolean('show_name')->default(true);
      $table->string('sername')->nullable();
        $table->boolean('show_sername')->default(false);
      $table->string('email')->unique()->nullable();
        $table->boolean('show_email')->default(false);
      $table->string('password')->nullable();
      $table->boolean('active')->default(true);
      $table->boolean('confirmed')->default(false);
      $table->string('gender')->nullable();
      $table->string('birth')->nullable();
      $table->string('device')->nullable();
      $table->string('avatar')->nullable();
      $table->string('platform')->nullable();
      $table->boolean('is_client')->default(false);
      $table->string('country')->nullable();
        $table->string('phone_code')->nullable();
      $table->string('phone')->nullable();
        $table->string('additional_phone_code')->nullable();
        $table->string('additional_phone')->nullable();
        $table->boolean('show_phone')->default(false);
        $table->boolean('show_additional_phone')->default(false);
        $table->string('skype')->nullable();
        $table->boolean('show_skype')->default(false);
        $table->string('facebook')->nullable();
        $table->boolean('show_facebook')->default(false);
        $table->string('instagram')->nullable();
        $table->boolean('show_instagram')->default(false);
        $table->string('www')->nullable();
        $table->boolean('show_www')->default(false);
        $table->string('photo')->nullable();
        $table->boolean('show_photo')->default(true);

      $table->rememberToken();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down()
  {

    DB::statement('SET FOREIGN_KEY_CHECKS = 0');
    Schema::drop('users');
    DB::statement('SET FOREIGN_KEY_CHECKS = 1');

  }
}

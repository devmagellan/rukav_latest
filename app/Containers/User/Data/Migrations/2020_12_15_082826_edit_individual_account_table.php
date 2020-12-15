<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditIndividualAccountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('individual_accounts', function (Blueprint $table) {
          $table->string('www')->nullable()->change();
          $table->string('address')->nullable()->change();
          $table->string('post_code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('individual_accounts', function($table) {
          $table->string('www')->nullable(false)->change();
          $table->string('address')->nullable(false)->change();
          $table->string('post_code')->nullable(false)->change();
        });
    }
}

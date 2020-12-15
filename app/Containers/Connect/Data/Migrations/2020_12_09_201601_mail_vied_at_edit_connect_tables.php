<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class MailViedAtEditConnectTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
      Schema::table('connects', function (Blueprint $table) {
        $table->datetime('mail_viewed_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('connects', function($table) {
        $table->dropColumn('mail_viewed_at');

      });
    }
}

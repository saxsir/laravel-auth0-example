<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('sub')->unique();

            $table->renameColumn('password', '__unused_password');
            $table->renameColumn('email_verified_at', '__unused_email_verified_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['sub']);

            $table->renameColumn('__unused_password', 'password');
            $table->renameColumn('__unused_email_verified_at', 'email_verified_at');
        });
    }
}

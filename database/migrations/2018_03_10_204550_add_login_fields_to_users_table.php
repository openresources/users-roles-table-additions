<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoginFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->unsigned()->nullable()->after('email');
            $table->integer('status_id')->unsigned()->nullable()->after('password');
            $table->timestamp('last_login')->nullable()->after('status_id');
            $table->timestamp('current_login')->nullable()->after('last_login');
            $table->integer('login_count')->unsigned()->nullable()->after('current_login');
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
            $table->dropColumn('additional_role_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('status_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('last_login');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('current_login');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('login_count');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAccessTokenToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')
                ->nullable()
                ->default(null)
                ->after('name');
            $table->string('access_token')
                ->nullable()
                ->default(null)
                ->after('name');
            $table->string('access_token_secret')
                ->nullable()
                ->default(null)
                ->after('access_token');
            $table->string('avatar')
                ->nullable()
                ->default(null)
                ->after('access_token_secret');
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
            $table->dropColumn('nickname');
            $table->dropColumn('access_token');
            $table->dropColumn('access_token_secret');
            $table->dropColumn('avatar');
        });
    }
}

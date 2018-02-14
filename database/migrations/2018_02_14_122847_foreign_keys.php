<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('actors', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('actor_movie', function (Blueprint $table) {
            $table->foreign('actor_id')->references('id')->on('actors');
            $table->foreign('movie_id')->references('id')->on('movies');
        });

        Schema::table('images', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');

        });

        Schema::table('category', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');

        });
    }
    
    public function down()
    {
        Schema::table('movies', function (Blueprint $table) {
            $table->dropForeign(['category_id', 'user_id']);
        });

        Schema::table('actors', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('actor_movie', function (Blueprint $table) {
            $table->dropForeign(['actor_id', 'movie_id']);
        });
        Schema::table('images', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('category', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
    }
}

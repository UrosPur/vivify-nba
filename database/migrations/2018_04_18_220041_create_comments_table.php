<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->unsignedInteger('team_id');
            $table->foreign('team_id')
                ->references('id')
                ->on('teams')
                ->onDelete('cascade');


        });


        //not sure
//        Schema::create('comments_teams', function (Blueprint $table) {
//
//            $table->integer('comments_id');
//            $table->integer('teams_id');
//            $table->primary(['comments_id', 'teams_id']);
//
//
//        });
//
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {

            $table->dropForeign('comments_user_id_foreign');
            $table->drop('user_id');
            $table->dropForeign('comments_team_id_foreign');
            $table->drop('team_id');

        });
//          not sure
//        Schema::dropIfExists('comments');
//        Schema::dropIfExists('comments_teams');
    }
}

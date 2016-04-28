<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('project_id');
            $table->string('title');
            $table->tinyInteger('is_deleted');
            $table->timestamps();
        });
 
         Schema::create('projects_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->integer('projects_id')->unsigned()->index();
            $table->foreign('projects_id')->references('project_id')->on('projects')->onDelete('cascade');
        });
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects_user', function(Blueprint $table) {
            $table->dropForeign('projects_user_user_id_foreign');
            $table->dropForeign('projects_user_projects_id_foreign');
        });
        Schema::drop('projects');
        Schema::drop('projects_user');
    }
}

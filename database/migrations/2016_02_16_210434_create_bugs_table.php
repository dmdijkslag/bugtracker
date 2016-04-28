<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bugs', function (Blueprint $table) {
            $table->increments('bug_id');
            $table->integer('project_id')->unsigned()->index();
            $table->integer('status_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->string('subject');
            $table->string('url');
            $table->text('description');
            $table->integer('priority_id')->index();
            $table->integer('assigned_to_user_id')->index();
            $table->integer('total_time_spent');
            $table->integer('is_public');
            $table->timestamp('finished_at')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                    ->references('user_id')
                    ->on('users')
                    ->onDelete('cascade');
                    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bugs', function(Blueprint $table) {
            $table->dropForeign('bugs_user_id_foreign');
        });
        Schema::drop('bugs');
    }
}

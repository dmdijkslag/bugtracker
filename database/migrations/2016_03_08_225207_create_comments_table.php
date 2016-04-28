<?php

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
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('comment_id');
            $table->integer('bug_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('status_id_from')->unsigned()->index();
            $table->integer('status_id_to')->unsigned()->index();
            $table->integer('time_spent')->unsigned()->index();
            $table->text('description');
            $table->string('comment_url');
            $table->dateTime('executed_at');
            $table->timestamps();
 
            $table->foreign('bug_id')
                    ->references('bug_id')
                    ->on('bugs')
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
        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign('comments_bug_id_foreign');
        });
        Schema::drop('comments');
    }
}

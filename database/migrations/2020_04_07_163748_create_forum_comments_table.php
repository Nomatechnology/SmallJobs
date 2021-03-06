<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForumCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forum_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table -> string('comment');
            $table -> integer('likes');
            $table -> integer('dislikes');
            $table -> bigInteger('forum_post_id',$autoIncrement = false,$unsigned=true);
            $table-> bigInteger('user_id',$autoIncrement = false,$unsigned = true);
            $table -> string('username');
            $table->timestamps();
            $table -> foreign('forum_post_id')->references('id')->on('forum_posts');
            $table -> foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('forum_comments');
    }
}

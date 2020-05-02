<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('posts', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('title');
      $table->text('description');
      $table->text('content');
      $table->string('tags');
      $table->string('image');
      $table->dateTime('published');
      $table->unsignedBigInteger('category_id')->nullable();
      $table->unsignedBigInteger('author_id')->nullable();
      $table->unsignedBigInteger('comment_id')->nullable();
      $table->timestamps();
      $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
      $table->foreign('author_id')->references('id')->on('authors')->onUpdate('cascade')->onDelete('set null');
      $table->foreign('comment_id')->references('id')->on('comments')->onUpdate('cascade')->onDelete('set null');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('posts');
  }
}

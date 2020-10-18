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
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('title');
            $table->string('image');
            $table->text('content');
            $table->text('description');
            $table->date('published');
            $table->date('updated')->nullable();
            $table->boolean('is_published')->default(true);
            $table->boolean('is_pinned')->default(false);
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('author_id')->references('id')->on('authors')->onUpdate('cascade')->onDelete('set null');
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

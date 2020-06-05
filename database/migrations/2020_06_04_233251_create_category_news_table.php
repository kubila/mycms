<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryNewsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('category_news', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('category_id')->unsigned()->nullable();
      $table->bigInteger('news_id')->unsigned()->nullable();
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('category_news');
  }
}

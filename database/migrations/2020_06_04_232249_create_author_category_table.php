<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorCategoryTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('author_category', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->bigInteger('author_id')->nullable()->unsigned();
      $table->bigInteger('category_id')->nullable()->unsigned();
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
    Schema::dropIfExists('author_category');
  }
}

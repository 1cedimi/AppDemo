<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChartsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('charts', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->unsignedBigInteger('creator_id')->nullable();
      $table->foreign('creator_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
      $table->string('name', 18)->unique();
      $table->text('description')->nullable();
      $table->boolean('active')->default(false);
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
    Schema::dropIfExists('charts');
  }
}
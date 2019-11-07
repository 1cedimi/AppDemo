<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasetsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('datasets', function (Blueprint $table) {
      /* $table->bigIncrements('id'); */
      $table->unsignedBigInteger('chart_id');
      $table->foreign('chart_id')
            ->references('id')
            ->on('charts')
            ->onDelete('cascade');
      $table->date('date');
      $table->primary(['chart_id', 'date']); //composite key
      $table->decimal('temperature', 3, 1)->nullable();
      $table->decimal('air_infection', 5, 2)->nullable();
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
    Schema::dropIfExists('datasets');
  }
}
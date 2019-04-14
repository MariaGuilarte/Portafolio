<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration {
  
  public function up() {
    Schema::create('projects', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name', 191);
      $table->text('description');
      $table->date('start_date');
      $table->date('end_date');
      $table->integer('budget');
      
      $table->unsignedBigInteger('client_id');
      $table->foreign('client_id')->references('id')->on('clients');
      
      $table->unsignedBigInteger('platform_id');
      
      $table->unsignedBigInteger('development_status_id');
      $table->foreign('development_status_id')->references('id')->on('development_statuses');
      
      $table->unsignedBigInteger('payment_method_id');
      $table->foreign('payment_method_id')->references('id')->on('payment_methods');
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('projects');
  }
}

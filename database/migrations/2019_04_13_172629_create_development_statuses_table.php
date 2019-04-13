<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopmentStatusesTable extends Migration {
  
  public function up() {
    Schema::create('development_statuses', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name', 191);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('development_statuses');
  }
}

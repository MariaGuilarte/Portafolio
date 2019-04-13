<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformsTable extends Migration {
  
  public function up() {
    Schema::create('platforms', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name', 191)->unique();
      $table->string('description', 191);
      $table->string('icon', 191);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('platforms');
  }
}

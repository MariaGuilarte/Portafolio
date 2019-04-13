<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration {

  public function up() {
    Schema::create('clients', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name', 191);
      $table->string('email', 191)->unique();
      $table->string('phone_number', 191);
      $table->string('country', 191);
      $table->timestamps();
    });
  }

  public function down() {
    Schema::dropIfExists('clients');
  }
}

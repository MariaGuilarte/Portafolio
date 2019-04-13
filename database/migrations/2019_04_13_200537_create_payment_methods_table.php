<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentMethodsTable extends Migration {
  
  public function up() {
    Schema::create('payment_methods', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name', 191);
      $table->string('logo', 191);
      $table->string('url', 191);
      $table->timestamps();
    });
  }
  
  public function down() {
    Schema::dropIfExists('payment_methods');
  }
  
}
